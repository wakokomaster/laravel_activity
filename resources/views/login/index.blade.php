@extends('layout.main')

@section('content')
<style>
    .login {
        background-color: #dcdcdc;
        aspect-ratio: 1;
        width: max(33vw, 400px);
    }

    .container {
        height: 100%;
        display: flex;
        place-items: center;
    }

    .text-danger {
        margin: 0;
        font-size: 12px;
    }
</style>

<div class="container">
    <div class="login p-4 rounded shadow-lg mx-auto">
        <h1>User Login</h1>
        <form action="/login" method="post">
            @csrf
            @error('username')
            <p class="text-danger">{{$message}}</p>
            @enderror
            @error('password')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div class="form-group">
                <label class="form-label" for="username">Username</label>
                <input class="form-control" type="text" id="username" name="username">
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password">
            </div>
            <input class="mt-4 btn btn-info" type="submit" value="Login">
        </form>
    </div>
</div>
@endsection
