@extends('layouts.app')

@section('title', 'Login')

@section('content')
   <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf
        <div class="login-title">Login</div>

        <div>
            <input id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required
                autofocus>
            @error('email')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <input id="password" type="password" name="password" placeholder="Password" required>
            @error('password')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="remember">
                <input id="remember" type="checkbox" name="remember">
                Remember me
            </label>
        </div>

        <div>
            <button type="submit">Login</button>
        </div>
    </form>
@endsection
