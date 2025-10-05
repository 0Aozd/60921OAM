@extends('layout')

@section('content')
<div class ="row justify-content-center">
    <div class="col-4">
        <h2>Добавление транзакции</h2>
        <form method="post" action="{{ url('transaction') }}">
            @csrf
            <div class="mb-3">
                <label for="description" class="form-label">Описание транзакции</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror"
                       id="description" name="description" aria-describedby="descriptionHelp" value="{{ old('description') }}"/>
                <div id="descriptionHelp" class="form-text">Введите описание транзакции</div>
                @error('description')
                <div class="is-invalid">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Количество денег</label>
                <input type="text" class="form-control @error('amount') is-invalid @enderror"
                       id="amount" name="amount" aria-describedby="amountHelp" value="{{old('amount')}}"/>
                <div id="amountHelp" class="form-text">Введите количество использованных финансов</div>
                @error('amount')
                <div class="is-invalid">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Категория транзакции</label>
                <select class="form-select" id="category_id" name="category_id" aria-describedby="categoryHelp"  value="{{old('category_id')}}" >
                    <option style="display:none"></option>
                    @foreach($categories as $category)
                    <option value="{{$category->category_id}}"
                            @if(old('category_id') == $category->category_id) selected @endif>
                    {{$category->name}}
                    </option>
                    @endforeach
                    <option value="new" @if(old('category_id') == 'new') selected @endif>+ Новая категория</option>
                </select>
                <div id="categoryHelp" class="form-text">Выберите категорию транзакции</div>
                @error('category_id')
                <div class="is-invalid">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3" id="new-category-block" style="display:none;">
                <label for="new_category" class="form-label">Новая категория</label>
                <input type="text" class="form-control @error('new_category') is-invalid @enderror"
                       id="new_category" name="new_category" value="{{ old('new_category') }}">
                <div id="newCategoryHelp" class="form-text">Введите название новой категории</div>
                @error('new_category')
                <div class="is-invalid">{{ $message }}</div>
                @enderror
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const select = document.getElementById('category_id');
                    const newCategoryBlock = document.getElementById('new-category-block');

                    if (select && newCategoryBlock) {
                        function toggleNewCategory() {
                            newCategoryBlock.style.display = (select.value === 'new') ? 'block' : 'none';
                        }

                        toggleNewCategory();
                        select.addEventListener('change', toggleNewCategory);
                    }
                });
            </script>

            <div class="mb-3">
                <label class="form-label d-block">Тип транзакции</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('type') is-invalid @enderror"
                           type="radio" name="type" id="income" value="income"
                           {{ old('type')=='income'?'checked':'' }}>
                    <label for="income" class="form-check-label">Доход</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('type') is-invalid @enderror"
                           type="radio" name="type" id="expense" value="expense"
                           {{ old('type')=='expense'?'checked':'' }}>
                    <label for="expense" class="form-check-label">Расход</label>
                </div>
                <div id="typeHelp" class="form-text">Выберите тип транзакции</div>
                @error('type')
                <div class="is-invalid">{{$message}}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
</div>
@endsection
