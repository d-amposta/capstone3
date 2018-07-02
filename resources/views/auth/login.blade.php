@extends('layout/landing')

@section('content')
<div class="landing-container">
    <div class="landing-content">
        <div class="landing-content-header">
            <h2>Welcome to Interests!</h2>
        </div>
    </div>
    <div class="landing-form">
        <div class="landing-form-header landing-form-container">
            <p class="landing-nav" data-target="signup-form">Sign Up</p>
            <p class="landing-text">or</p>
            <p class="landing-nav" data-target="login-form">Log In</p>
        </div>
        <div class="landing-form-content landing-form-container" id="login-form">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="email" type="email" class="landing-form-control" name="email" value="{{ old('email') }}" placeholder="Your Email" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="password" type="password" class="landing-form-control" name="password" placeholder="Your Password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>
                        
                    </div>
                </div>
                <div>
                    <button class="btn-link">
                        <a href="{{ route('password.request') }}">Forgot Your Password?
                        </a>
                    </button>
                    <button class="btn-link landing-nav" data-target="signup-form">
                        I don't have an account
                    </button>
                </div>
            </form>
        </div>
        <div class="landing-form-content landing-form-container" id="signup-form">
             <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input id="name" type="text" class="landing-form-control" name="name" value="{{ old('name') }}" placeholder="Your Name" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input id="email" type="email" class="landing-form-control" name="email" value="{{ old('email') }}" placeholder="Your Email" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input id="password" type="password" class="landing-form-control" name="password" placeholder="Your Password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="password-confirm" type="password" class="landing-form-control" name="password_confirmation" placeholder="Confirm Your Password" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <button type="submit" class="btn">
                            Complete Registration!
                        </button>
                    </div>
                </div>
                <div>
                    <button class="btn-link landing-nav" data-target="login-form">
                        I already have an account
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
