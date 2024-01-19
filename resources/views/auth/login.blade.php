@extends('layouts.app')

@section('content')
        <section class="container1 forms">
            <div class="form login">
                <div class="form-content">
                    <header>Login</header>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="field input-field">
                            <label for="email" class="fw-medium">{{ __('Email Address') }}</label>
                            <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="field input-field">
                            <label for="email" class="fw-medium">{{ __('Password') }}</label>
                            <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="field button-field">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>

                        <div class="form-link">
                            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                        </div>

                    </form>

                    <div class="form-link">
                        <span>Don't have an account?
                            @if (Route::has('register'))
                            <a href="{{route('register')}}" class="link signup-link">Signup</a>
                            @endif
                        </span>
                    </div>
                </div>

            </div>
        </section>
@endsection