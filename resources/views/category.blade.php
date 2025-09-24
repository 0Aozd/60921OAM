<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
</head>
<body>
    <h2>{{$category ? "Список категорий финансов ".$category->name : 'Неверный ID категории'}}</h2>
    @if($category)
    <table border="1">
        <thead>
            <td>id</td>
            <td>Описание</td>
            <td>Количество</td>
        </thead>
        @foreach ($category->transactions as $transaction)
            <tr>
                <td>{{$transaction->transactions_id}}</td>
                <td>{{$transaction->description}}</td>
                <td>{{$transaction->amount}}</td>
            </tr>
        @endforeach
    </table>
    @endif
</body>
</html>
