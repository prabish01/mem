@extends('layouts.frontend')

@section('content')
<div class="content-body">
    <section id="aboutUs" class="section-padd">
        <div class="container">
            <h4 class="fw-bold" style="color: #333; font-size: 32px; margin-bottom: 10px;">Register</h4>
            <div style="width: 50px; height: 3px; background-color: #333; margin-bottom: 20px;"></div>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <div class="login-left" style="background-image: url('{{asset('assets/img/s1.jpg')}}');">
                        <div class="z-1">
                            <h4 class="mb-3">Already have an account?</h4>
                            <p>
                                Sign up now to have access to various features like ordering and buying various documents and books related to electronics and electrical devices.
                            </p>
                            <a href="{{route('login')}}" class="login-btn">Login Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="login-right">
                        <h5 class="mb-5">Create Account</h5>
                        <form id="loginForm" method="POST" action="{{ route('register') }}">
                            @csrf
                            <input type="hidden" name="role_id" value="3">
                            <input type="hidden" name="is_approved" value="0">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Enter Name" required autofocus>
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter Email" required>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Enter Password" required>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                            <input id="pan_number" type="number" class="form-control{{ $errors->has('pan_number') ? ' is-invalid' : '' }}" name="pan_number" value="{{ old('pan_number') }}" placeholder="Enter PAN Number" required>
                            @if ($errors->has('pan_number'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('pan_number') }}</strong>
                            </span>
                            @endif
                            <button type="submit" class="login-btn">Create Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.includes.newsletter')

</div>
@endsection