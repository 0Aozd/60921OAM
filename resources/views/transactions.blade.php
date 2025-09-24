<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
</head>
<body>
    <h2>Список транзакций</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Описание</td>
            <td>Количество</td>
            <td>Категория</td>
        </thead>
    @foreach ($transactions as $transaction)
        <tr>
            <td>{{$transaction->transactions_id}}</td>
            <td>{{$transaction->description}}</td>
            <td>{{$transaction->amount}}</td>
            <td>{{$transaction->category->name}}</td>
        </tr>
    @endforeach
    </table>
</body>
</html>
