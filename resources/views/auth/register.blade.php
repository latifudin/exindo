@extends('layouts.app')

@section("content")
<section class="container1 forms">
    <div class="form login">
        <div class="form-content">
            <header>Register</header>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="field input-field">
                    <label for="name" class="fw-medium">{{ __('Name') }}</label>
                    <input id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="field input-field">
                    <label for="email" class="fw-medium">{{ __('Email Address') }}</label>
                    <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="field input-field">
                    <label for="password" class="fw-medium">{{ __('Password') }}</label>
                    <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="field input-field">
                    <label for="password-confirm" class="fw-medium">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="password" name="password_confirmation" required autocomplete="new-password">
                    <i class='bx bx-hide eye-icon'></i>
                </div>

                <div class="field button-field">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>

            </form>

            <div class="form-link">
                <span>Already have an account? 
                    @if (Route::has('login'))
                            <a href="{{route('login')}}" class="link signup-link">Signup</a>
                            @endif
                </span>
            </div>
        </div>

    </div>
</section>
@endsection