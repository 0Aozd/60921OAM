@extends('layout')

@section('content')
<body>

<div class="register-card">

    <h3 class="text-center mb-4">Регистрация</h3>

    <form method="POST" action="{{ url('registration') }}">
        @csrf

        {{-- Имя --}}
        <div class="mb-3">
            <label class="form-label">Имя</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <label class="form-label">Почта</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
            @error('email')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Телефон --}}
        <div class="mb-3">
            <label class="form-label">Номер телефона</label>
            <input type="text" name="phone" class="form-control" required value="{{ old('phone') }}">
            @error('phone')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Пароль --}}
        <div class="mb-3">
            <label class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control" required>
            @error('password')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Повтор пароля --}}
        <div class="mb-3">
            <label class="form-label">Повторите пароль</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary btn-main">Зарегистрироваться</button>
    </form>

</div>

</body>
@endsection
