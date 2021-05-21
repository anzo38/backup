@extends('layouts.login_main')

@section('content')
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">login</div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">login</p>
                <form method="post" action={{ route('login.post') }}> 
                    @csrf
                    <div class="input-group mb-3">
                        <input  type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" >
                        <div class="input-group-append">
                            <div class="input-group-text @error('email') is-invalid @enderror">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
                    </div>
        
                    <div class="input-group mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text @error('password') is-invalid @enderror">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>

                    <div class="row">
                        <div class="col-4">
                            {{-- <div class="form-check"> --}}
                                {{-- <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label> --}}
                            {{-- </div> --}}
                        </div>
                    
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                        <p class="mb-3">
                            <a href={{ route('register') }} class="text-center">sign up</a>
                            {{-- <a href="/register" class="text-center">sign up</a> --}}
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection