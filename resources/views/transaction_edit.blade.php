<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
    <style>  .is-invalid {color: red;} </style>
</head>
<body>
<h2>Редактирование транзакции</h2>
<form method="post" action = "{{ url('transaction/update/'.$transaction->transactions_id) }}">
    @csrf
    <label>Описание транзакции</label>
    <input type="text" name="description" value="@if (old('description')) {{ old('description') }} @else {{$transaction->description}} @endif"/>
    @error('description')
    <div class="is-invalid">{{$message}}</div>
    @enderror
    <br>
    <label>Количество денег</label>
    <input type="text" name="amount" value="@if (old('amount')) {{ old('amount') }} @else {{$transaction->amount}} @endif"/>
    @error('amount')
    <div class="is-invalid">{{$message}}</div>
    @enderror
    <br>
    <label>Категория транзакции</label>
    <select name="category_id" value="{{old('category_id')}}">
        <option style="display:none"></option>
        @foreach($categories as $category)
            <option value="{{$category->category_id}}"
                    @if(old('category_id'))
                        @if(old('category_id') == $category->category_id) selected @endif
                    @else
                        @if($transaction->category_id == $category->category_id) selected @endif
                @endif>{{$category->name}}
            </option>
        @endforeach
    </select>
    @error('category_id')
    <div class="is-invalid">{{$message}}</div>
    @enderror
<br>
    <label>Тип транзакции</label>
    <input type="radio" name="type" value = "income"
       @if(old('type'))
           @if(old('type') == 'income') checked @endif
       @else
           @if($transaction->type == 'income') checked @endif
       @endif> Доход

    <input type="radio" name="type" value = "expense"
       @if(old('type'))
           @if(old('type') == 'expense') checked @endif
       @else
           @if($transaction->type == 'expense') checked @endif
       @endif> Расход<br>
        <!--{ old('type')=='income'?'checked':'' }}> Доход
    <input type="radio" name="type" value = "expense"
        { old('type')=='expense'?'checked':'' }}> Расход<br>-->
    @error('type')
        <div class="is-invalid">{{$message}}</div>
    @enderror
    <input type="submit">
</form>
</body>
</html>
