@extends('layouts.frontend')

@section('content')
    <div class="content-body">
        <section id="aboutUs" class="section-padd">
            <div class="container">
                <h4>Login</h4>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="login-left" style="background-image: url('{{asset('assets/img/s1.jpg')}}');">
                            <div class="z-1">
                                <h4 class="mb-3">New to our website?</h4>
                                <p>
                                    Sign up now to have access to various features like ordering and buying various documents and books related to electronics and electrical devices.
                                </p>
                                <a href="{{route('register')}}" class="login-btn">Register</a>
                                 <a href="{{ url('dealersignup')}}" class="login-btn">Register As Dealer</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="login-right">
                            <h5 class="mb-5">LOGIN NOW</h5>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session('warning'))
                                <div class="alert alert-warning">
                                    {{ session('warning') }}
                                </div>
                            @endif
                            <form id="loginForm" method="POST" action="{{ route('login') }}">
                                @csrf
                                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                                @endif
                                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" id="password" name="password" placeholder="Password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                                @endif
                                <button type="submit" class="login-btn">Login</button>
                                <div class="mt-4">
                                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('frontend.includes.newsletter')
    </div>
@endsection
