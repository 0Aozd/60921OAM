@extends('layout')

@section('content')
    <div class="container mt-4">
        <h2>Список транзакций</h2>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
            <tr>
                <th>id</th>
                <th>Описание</th>
                <th>Количество</th>
                <th>Тип финансовой операции</th>
                <th>Категория</th>
                <th>Дата</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->transactions_id }}</td>
                    <td>{{ $transaction->description }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->type }}</td>
                    <td>{{ $transaction->category->name }}</td>
                    <td>{{ $transaction->date ? $transaction->date->format('d.m.Y') : '' }}</td>
                    <td>
                        <a class="btn btn-danger btn-sm" href="{{ url('transaction/destroy/'.$transaction->transactions_id) }}">Удалить</a>
                        <a class="btn btn-success btn-sm" href="{{ url('transaction/edit/'.$transaction->transactions_id) }}">Редактировать</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $transactions->links() }}
        </div>

        <form method="get" action="{{ url('transaction') }}" class="mb-3 d-flex align-items-center">
            <label for="perpage" class="me-2">Элементов на странице:</label>
            <select name="perpage" id="perpage" class="form-select me-2" style="width: auto;">
                <option value="2" @if($transactions->perPage() == 2) selected @endif>2</option>
                <option value="3" @if($transactions->perPage() == 3) selected @endif>3</option>
                <option value="4" @if($transactions->perPage() == 4) selected @endif>4</option>
            </select>
            <button type="submit" class="btn btn-primary btn-sm">Изменить</button>
        </form>

    </div>
@endsection
