@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-4">
            <h2>Редактирование транзакции</h2>
            <form method="post" action="{{ url('transaction/update/'.$transaction->transactions_id) }}">
                @csrf
                <div class="mb-3">
                    <label for="description" class="form-label">Описание транзакции</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror"
                           id="description" name="description" aria-describedby="descriptionHelp"
                           value="{{ old('description', $transaction->description) }}">
                    <div id="descriptionHelp" class="form-text">Введите описание транзакции</div>
                    @error('description')
                    <div class="is-invalid">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="amount" class="form-label">Количество денег</label>
                    <input type="text" class="form-control @error('amount') is-invalid @enderror"
                           id="amount" name="amount" aria-describedby="amountHelp"
                           value="{{ old('amount', $transaction->amount) }}">
                    <div id="amountHelp" class="form-text">Введите количество использованных финансов</div>
                    @error('amount')
                    <div class="is-invalid">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Категория транзакции</label>
                    <select class="form-select @error('category_id') is-invalid @enderror"
                            id="category" name="category_id" aria-describedby="categoryHelp">
                        <option style="display:none"></option>
                        @foreach($categories as $category)
                            <option value="{{ $category->category_id }}"
                                {{ old('category_id', $transaction->category_id) == $category->category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <div id="categoryHelp" class="form-text">Выберите категорию транзакции</div>
                    @error('category_id')
                    <div class="is-invalid">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label d-block">Тип транзакции</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('type') is-invalid @enderror"
                               type="radio" name="type" id="income" value="income"
                            {{ old('type', $transaction->type) == 'income' ? 'checked' : '' }}>
                        <label for="income" class="form-check-label">Доход</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('type') is-invalid @enderror"
                               type="radio" name="type" id="expense" value="expense"
                            {{ old('type', $transaction->type) == 'expense' ? 'checked' : '' }}>
                        <label for="expense" class="form-check-label">Расход</label>
                    </div>
                    <div id="typeHelp" class="form-text">Выберите тип транзакции</div>
                    @error('type')
                    <div class="is-invalid">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
