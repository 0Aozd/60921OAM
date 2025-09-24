<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
</head>
<body>
<h2>{{$transaction? "Имена пользователей по совместной транзакции ".$transaction->transactions_id : 'Транзакция не найдена'}}</h2>

@if($transaction)
    <table border="1">
        <tr>
            <td>Пользователи</td>
            <td>Почта</td>
            <td>Сумма</td>
            <td>Описание</td>
        </tr>
        @foreach($transaction->users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email }}</td>
                <td>{{$user->pivot->amount}}</td>
                <td>{{$transaction->description }}</td>
            </tr>
        @endforeach
    </table>
@else
    <p>У пользователя нет транзакций.</p>
@endif
</body>
</html>
