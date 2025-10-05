<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Transaction;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 2;
        return view('transactions', [
            'transactions' => Transaction::where('user_id', auth()->id())->orderBy('date', 'desc')->paginate($perpage)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaction_create', [
            'categories' => Category::where('user_id', Auth::id())->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        $validated = $request->validate([
            //'user_id'     => 'required|integer',
            'category_id' => 'required',
            'new_category' => 'nullable|required_if:category_id,new|string|max:255',

            'description' => 'required|string|max:255',
            'currency_id' => 'nullable|integer',
            'amount'      => 'required|numeric',
            'type'        => 'required|in:income,expense',
            'date' => 'nullable|date',
        ]);

        if ($validated['category_id'] === 'new') {
            $category = Category::create([
                'name'    => $validated['new_category'],
                'user_id' => auth()->id(),
                'type'    => $validated['type'], // тот же тип, что у транзакции
            ]);
            $validated['category_id'] = $category->category_id;
        } else {
            $category = Category::where('category_id', $validated['category_id'])
                ->where('user_id', auth()->id())
                ->first();

            $validated['category_id'] = $category->category_id;
        }

        $validated['user_id'] = auth()->id() ?? 1;
        $validated['currency_id'] = 1;
        $validated['date'] =$validated['date'] ?? now();

        $transaction = new Transaction($validated);
        $transaction->save();
        return redirect('/transaction');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('transaction', [
            'transaction' => Transaction::all()
                ->where('transactions_id', $id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('transaction_edit', [
            'transaction' => Transaction::all()->where('transactions_id', $id)->first(),
            'categories' => Category::where('user_id', Auth::id())->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (! Gate::allows('edit-transaction', Transaction::all()
            ->where('transactions_id', $id)->first())) {
            return redirect('/error')->with('message',
                "У вас нет разрешения на редактирование транзакции номер " . $id);
        }

        $validated = $request->validate([
            //'user_id'     => 'required|integer',
            'category_id' => 'required|integer',
            'description' => 'required|string|max:255',
            'currency_id' => 'nullable|integer',
            'amount'      => 'required|numeric',
            'type'        => 'required|in:income,expense',
            'date' => 'nullable|date',
        ]);

        $transaction = Transaction::all()->where('transactions_id', $id)->first();

        $transaction->description = $validated['description'];
        $transaction->amount = $validated['amount'];
        $transaction->category_id = $validated['category_id'];
        $transaction->type = $validated['type'];
        $transaction->currency_id = 1;
        $transaction->date = $validated['date'] ?? now();
        //$transaction->user_id = $validated['user_id'];
        $transaction->save();
        return redirect('/transaction');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (! Gate::allows('destroy-transaction', Transaction::all()
            ->where('transactions_id', $id)->first())) {
            return redirect('/error')->with('message',
            "У вас нет разрешения на удаление транзакции номер " . $id);
        }

        Transaction::destroy($id);
        return redirect('/transaction')->withErrors([
            'deleted' => 'Вы успешно удалили транзакцию - '. $id
        ]);;
    }
}
