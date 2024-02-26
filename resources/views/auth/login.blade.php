@extends('layouts.app')
@push('styles')

<style>
     .bgoverlay {
        background-image: url('/assets/images/uq-herston-24-hours-on-campus-1.jpg');
        background-size: cover;
        background-position: center;
    }
    .bgoverlay {
    background-image: url(/assets/images/uq-herston-24-hours-on-campus-1.jpg);
    background-size: cover;
    background-position: center;
    width: 100%;
    height: 100vh;
    position: absolute;
    top: 0;
    left: 0;
    filter: blur(4px);
}
    </style>
@endpush
@section('content')
<div class="login-bg">
    <div class="bgoverlay"></div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
  <div class="card-header"><h4>LOG IN TO SAVE YOUR NOTES</h4><br><h5 class="text-danger">We are sorry to inform you that, for technical issues, we lost our user data. Please register and login again to start making new notes.</h5></div>
                   

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
