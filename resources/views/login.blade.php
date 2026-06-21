@extends('layouts.app')
@section('title', 'Login - VRA Portal')
@section('content')
<div class="login-wrapper">
    <div class="login-glow"></div>
    <div class="login-card reveal">
        <div class="login-header">
            <h2 class="login-title">Access <span class="gradient-text">VRA Portal</span></h2>
            <p class="login-subtitle">Enter your credentials to manage cloud infrastructure</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="/login" method="POST" class="login-form-element">
            @csrf
            <div class="form-group">
                <label for="email">Portal Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@vra.com">
            </div>

            <div class="form-group">
                <label for="password">Security Password</label>
                <input type="password" id="password" name="password" required placeholder="••••••••">
            </div>

            <button type="submit" class="btn-primary login-btn"><span>Authenticate</span></button>
        </form>
    </div>
</div>
@endsection
