
@extends('layouts.master')


@section('content')


    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-6">
                <div class="welcome-page-bg-wrapper">
                    <img src="{{ asset('frontend/img/undraw_teaching_f1cm.svg') }}" alt="background" class="img-responsive">
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="welcome-page-form-wrapper">
                    <h1 class="text-left welcome-page-headline-text">Welcome to <span>iClassroom.</span></h1>
                    <form class="welcome-page-form"  method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>

                            <input type="email"  id="exampleInputEmail1" placeholder="Email" class="form-control form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                             </span>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>

                            <input id="exampleInputPassword1" type="password" placeholder="Password" class="form-control form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-info">Login</button>
                        <p class="sign-up-text">Not a member yet? <a href="{{ route('register') }}">Sign Up</a></p>
{{--
                        @if (Route::has('password.request'))
                            <a class="" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif--}}



                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection