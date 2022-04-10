@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-header bg-white text-center">
                    <div class="row">
                        <div class="col-12">
                            <img class="img-fluid" src="{{asset('images/pips-logo.png')}}" alt="PIPS Logo" data-cy="login-logo-pips"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <img class="img-fluid" src="{{asset('images/translate-logo.png')}}" alt="TRANSLATE Logo"  data-cy="login-logo-study"/>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2 data-cy="login-title">
                                Welcome to the OCTRU Participant Information PortalS
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            &#160;
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <h4 class="text-gray-800" data-cy="login-instruction">
                                Please enter your email address and PIPS password to access your Portal
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            &#160;
                        </div>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end" data-cy="login-input-email-label">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                       data-cy="login-input-email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end" data-cy="login-input-password-label">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                       name="password" required autocomplete="current-password"
                                       data-cy="login-input-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}
                                        data-cy="login-input-remember_me">

                                    <label class="form-check-label" for="remember"
                                           data-cy="login-input-remember_me-label">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" data-cy="login-submit">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" data-cy="login-forgot-password">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
