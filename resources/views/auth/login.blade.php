@extends('layouts.app')

@section('content')

<style>
     body {
        margin: 0;
        padding: 0;
        background-image: url('resources/views/auth/uq-herston-24-hours-on-campus-1.jpg');
        background-size: cover;
        background-position: center;
        height: 100vh; /* Adjust height as needed */
        font-family: Arial, sans-serif; /* Optional: Choose your preferred font */
    }

    </style>



<div class="container-fluid login-bg">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
  <div class="card-header">    <h4 class="card-reader">LOG IN TO SAVE YOUR NOTES</h4> </div>
                   

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password" required autocomplete="current-password">

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
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4 mb-2">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                                <hr>
                                <div class="col-md-8 offset-md-4 mt-1">
                                    <a href="https://dentnotes.com/register" class="btn btn-outline-success">
                                       
                                       Register For Account
                                    </a>
                                    <a href="{{ route('home') }}" class="btn btn-outline-success">
                                        <span class="bi bi-guest"></span>
                                        Visit As Guest
                                    </a>
                                </div>

                            </div>

                        </form>

                    </div>
                </div>

            </div>
            <!-- <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Demo Account') }}</div>

                    <div class="card-body">
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                              
                                        class="btn btn-primary">
                                    Fill Admin
                                </button>

                                <button type="button" onclick="fillForm('user@dentnotes.com', 'secret')"
                                        class="btn btn-primary">
                                    Fill User
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        // function fillForm(email, password) {
        //     // Set values for email and password fields
        //     document.getElementById('email').value = email;
        //     document.getElementById('password').value = password;
        // }
    </script>
@endpush
