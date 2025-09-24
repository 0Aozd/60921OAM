<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
</head>
<body>
<h2>{{$user? "Транзакции пользователя ".$user->name : 'Пользователь не найден'}}</h2>

@if($user)
    <table border="1">
        <tr>
            <td>ID транзакции</td>
            <td>Категория</td>
            <td>Сумма</td>
            <td>Описание</td>
        </tr>
        @foreach($user->transactions as $transaction)
            <tr>
                <td>{{$transaction->transactions_id}}</td>
                <td>{{$transaction->category->name }}</td>
                <td>{{$transaction->pivot->amount}}</td>
                <td>{{$transaction->description }}</td>
            </tr>
        @endforeach
    </table>
@else
    <p>У пользователя нет транзакций.</p>
@endif
</body>
</html>
