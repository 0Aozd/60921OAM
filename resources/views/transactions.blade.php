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
            <td>Тип финансовой операции</td>
            <td>Категория</td>
            <td>Действия</td>
        </thead>
    @foreach ($transactions as $transaction)
        <tr>
            <td>{{$transaction->transactions_id}}</td>
            <td>{{$transaction->description}}</td>
            <td>{{$transaction->amount}}</td>
            <td>{{$transaction->type}}</td>
            <td>{{$transaction->category->name}}</td>

            <td><a href="{{url('transaction/destroy/'.$transaction->transactions_id)}}">Удалить</a>
                <a href="{{url('transaction/edit/'.$transaction->transactions_id)}}">Редактировать</a>
            </td>
        </tr>
    @endforeach
    </table>
    <div>
        {{ $transactions->links() }}
    </div>
</body>
</html>
