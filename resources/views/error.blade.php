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
    @error('login')
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror
    @error('deleted')
    <div class="alert alert-warning" role="alert">
        {{$message}}
    </div>
    @enderror
</div>
