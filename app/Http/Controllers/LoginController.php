<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        //
    }

    public function show(Request $request) {
        return view('registration');
    }

    public function store(Request $request) {
        // Валидация
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'phone'    => 'required|string|max:30',
            'password' => 'required|confirmed|min:6',
        ]);

        // Создаем пользователя
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'phone'    => $validated['phone'],
            'password' => Hash::make($validated['password']),
        ]);

        // Авторизуем сразу после регистрации
        auth()->login($user);

        return redirect('/')->with('success', 'Вы успешно зарегистрированы!');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
           'email' => ['required', 'email'],
           'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/')->withErrors([
                'success' => 'Вы успешно вошли в систему'
            ]);
        }
        return back()->withErrors([
           'error' => 'The provided credentials do not match our records'
        ])->onlyInput('email', 'password');
    }

    public function login(Request $request)
    {
        return view('Main', ['user' => Auth::user()])
            ->withErrors([
                'login' => 'Вы должны быть авторизованы'
            ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->withErrors([
            'success' => 'Вы успешно вышли из системы',
        ]);
    }
}
