<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
</head>
<body>
    <h2>{ $message }}</h2>
    <a href="{url('transaction')}}">Назад</a>
</body>
</html>-->

<div class="container" style="margin-top: 80px">
    @error('email')
    <div class="alert alert-warning" role="alert">
        {{$message}}
    </div>
    @enderror
    @error('password')
    <div class="alert alert-warning" role="alert">
        {{$message}}
    </div>
    @enderror
    @error('error')
    <div class="alert alert-warning" role="alert">
        {{$message}}
    </div>
    @enderror
    @error('success')
    <div class="alert alert-warning" role="alert">
        {{$message}}
    </div>
    @enderror
    @error('deleted')
    <div class="alert alert-warning" role="alert">
        {{$message}}
    </div>
    @enderror
</div>
