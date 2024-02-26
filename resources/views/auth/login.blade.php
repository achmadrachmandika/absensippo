@extends('layouts.app')

@section('content')
<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form class="form" method="POST" action="{{ route('login') }}">
                @csrf
                <h3>Selamat Datang di Divisi PPA</h3>

                <label for="email">Email Address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <label for="password">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                        ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-login">Login</button>
                
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-register">Register</a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<style media="screen">
    /* CSS Styling */
    body {
        background-color: #080710;
        font-family: 'Poppins', sans-serif;
        color: #ffffff;
    }

    .background {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
    }

    .background .shape {
        height: 200px;
        width: 200px;
        position: absolute;
        border-radius: 50%;
    }

    .shape:first-child {
        background: linear-gradient(#1845ad, #23a2f6);
        left: -80px;
        top: -80px;
    }

    .shape:last-child {
        background: linear-gradient(to right, #ff512f, #f09819);
        right: -30px;
        bottom: -80px;
    }

    .container {
        padding-top: 20px;
    }

    .form {
        background-color: rgba(255, 255, 255, 0.13);
        border-radius: 10px;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
        padding: 50px 35px;
    }

    h3 {
        font-size: 32px;
        font-weight: 500;
        line-height: 42px;
        text-align: center;
        color: black;
    }

    label {
        font-size: 16px;
        font-weight: 500;
    }

    input {
        height: 50px;
        width: 100%;
        background-color: rgba(255, 255, 255, 0.07);
        border-radius: 3px;
        padding: 0 10px;
        margin-top: 8px;
        font-size: 14px;
        font-weight: 300;
    }

    .form-check {
        margin-top: 15px;
        margin-bottom: 15px;
    }

    .button-group {
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
    }

    button,
    a.btn {
        flex: 1;
        background-color: #ffffff;
        color: #080710;
        padding: 15px 0;
        font-size: 18px;
        font-weight: 600;
        border-radius: 5px;
        cursor: pointer;
        border: 1px solid black;
        transition: background-color 0.3s ease;
    }

    button:hover,
    a.btn:hover {
        background-color: #f0f0f0;
    }

    @media (max-width: 768px) {
        .form {
            width: 90%;
            padding: 30px;
        }
    }
</style>