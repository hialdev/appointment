@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-5 bg-white p-4 rounded-3">
            <h3><strong>Login</strong></h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row mb-3">
                    <div class="col">
                        <div class="form-group position-relative has-icon-left">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autofocus>
                            <div class="form-control-icon pb-1 mx-1">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <div class="form-group position-relative has-icon-left">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <div class="form-control-icon pb-1 mx-1">
                                <i class="bi bi-lock-fill"></i>
                            </div>
                        </div>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
