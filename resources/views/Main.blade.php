@extends('layout')

@section('content')
    <div class="container mt-5">
        <div class="text-center">
            <h1>Добро пожаловать в EasyMoney</h1>
            <p class="lead">Управляйте своими финансами просто и удобно</p>
            @if(Auth::check())
                <a href="{{ url('transaction') }}" class="btn btn-primary">Перейти к транзакциям</a>
            @else
                <a href="/" class="btn btn-success">Войти в систему</a>
            @endif
        </div>
    </div>
@endsection
