<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
    <style>  .is-invalid {color: red;} </style>
</head>
<body>
<h2>Добавление транзакции</h2>
<form method="post" action = "{{ url('transaction') }}">
    @csrf
    <label>Описание транзакции</label>
    <input type="text" name="description" value="{{ old('description') }}"/>
    @error('description')
    <div class="is-invalid">{{$message}}</div>
    @enderror
<br>
    <label>Количество денег</label>
    <input type="text" name="amount" value="{{old('amount')}}"/>
    @error('amount')
    <div class="is-invalid">{{$message}}</div>
    @enderror
<br>
    <label>Категория транзакции</label>
    <select name="category_id" value="{{old('category_id')}}">
        <option style="display:none">
        @foreach($categories as $category)
            <option value="{{$category->category_id}}"
                @if(old('category_id') == $category->category_id) selected
                @endif>{{$category->name}}
            </option>
        @endforeach
    </select>
    @error('category_id')
    <div class="is-invalid">{{$message}}</div>
    @enderror
<br>
    <label>Тип транзакции</label>
    <input type="radio" name="type" value = "income" {{ old('type')=='income'?'checked':'' }}> Доход
    <input type="radio" name="type" value = "expense" {{ old('type')=='expense'?'checked':'' }}> Расход<br>
    <input type="submit">
</form>
</body>
</html>
