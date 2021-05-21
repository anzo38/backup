@extends('layouts.login_main')

@section('content')
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">register</div>
    {{-- <div class="row justify-content-center"> --}}
        <div class="card">
            <div class="card-body login-card-body">
                
                <div class="card-body">
                    <p class="login-box-msg">register</p>
                    <form method="POST" action="{{ route('register.post') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" placeholder="Full name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text @error('name') is-invalid @enderror">
                                <span class="fas fa-user"></span>
                                </div>
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                         
                         
                        </div>

                        <div class="input-group mb-3">
                            <input  type="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                            <div class="input-group-append">
                                <div class="input-group-text  @error('email') is-invalid @enderror">
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
                            <input id="password" type="password" placeholder="Password"class="form-control @error('password') is-invalid @enderror" name="password">
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

                        <div class="input-group mb-3">
                            <input type="password" placeholder="Password" class="form-control" name="password_confirmation" >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        
                    </form>
                    <div>
                    <a href={{ route('login') }} class="text-center">I already have a membership</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
