@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-header bg-white text-center">
                    <img class="img-fluid" src="{{asset('images/pips-logo.png')}}" alt="PIPS Logo"  data-cy="page-logo"/>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h4 data-cy="page-instructions">
                                Please enter your email address, if you email address matches one we have in the PIPS system, you should receive an email within 5 minutes of pressing submit (please check your junk folder just in case the email goes into your junk folder).
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            &#160;
                        </div>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert" data-cy="page-alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end" data-cy="label-email">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}"
                                       required autocomplete="email" autofocus
                                    data-cy="input-email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert" data-cy="form-error-msg">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" data-cy="button-submit">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
