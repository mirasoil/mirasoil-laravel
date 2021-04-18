@extends('layouts.master')
@section('title')
<title>Logare - Mirasoil</title>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Authenticate') }}</div>

                <div class="card-body">
                <!--- We are checking if we passed a url parameter to the page when we called it. If we did, we modify the forms action to use the url parameter--->
                @isset($url)
                        <form method="POST" action='{{ route("login.$url", app()->getLocale()) }}' aria-label="{{ __('Login') }}">
                        @else
                        <form method="POST" action="{{ route('login', app()->getLocale()) }}" aria-label="{{ __('Login') }}">
                        @endisset
                            @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" value="{{ old('remember') ? 'checked' : '' }}">
                                    
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="col-md-8 offset-md-4 text-center">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request', app()->getLocale()) }}">
                                        {{ __('Forgot password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <a class="btn btn-link mt-5 ml-5" href="/register/user" style="float:right;">
                            {{ __('Nu ai cont? Înregistrează-te aici') }}
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@for ($i = 0; $i < 15; $i++)
    <br>
@endfor
@endsection
