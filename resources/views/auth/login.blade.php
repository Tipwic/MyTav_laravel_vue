@extends('layouts.welcome_layout')

@section('content')


<div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade">
    <div class="uk-width-1-1">

        <div class="uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
            <ul class="uk-tab uk-flex-center" uk-switcher="animation: uk-animation-fade">
                <li><a href="#">Log In</a></li>
                <li><a href="#">Sign Up</a></li>
                <li class="uk-hidden"><a href="#">Forgot Password?</a></li>
            </ul>

            <ul class="uk-switcher uk-margin">
                <!-- Login -->
                <li>
                    <h3 class="uk-card-title uk-text-center">Welcome back!</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="uk-margin">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon" uk-icon="icon: mail"></span>
                                <input id="email_login" type="email" name="email" class="uk-input uk-form-large form-control @error('email') is-invalid @enderror" placeholder="Email address" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="uk-margin">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                <input id="password" class="uk-input uk-form-large form-control @error('password') is-invalid @enderror" name="password" type="password" placeholder="Password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        @if (Route::has('password.request'))
                        <div class="uk-margin uk-text-right@s uk-text-center uk-text-small">
                            <a href="#" uk-switcher-item="2">Forgot Password?</a>
                        </div>
                        @endif

                        <div class="uk-margin">
                            <button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1">{{ __('Login') }}</button>
                        </div>
                        <div class="uk-text-small uk-text-center">
                            Not registered? <a href="#" uk-switcher-item="1">Create an account</a>
                        </div>

                    </form>
                </li>

                <!-- Register -->
                <li>
                    <h3 class="uk-card-title uk-text-center">Sign up today. It's free!</h3>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="uk-margin">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon" uk-icon="icon: user"></span>
                                <input id="name" class="uk-input uk-form-large form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="uk-margin">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon" uk-icon="icon: mail"></span>
                                <input id="email_register" class="uk-input uk-form-large form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="uk-margin">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                <input id="password_register" class="uk-input uk-form-large form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="uk-margin">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                <input placeholder="Confirm password" id="password-confirm" class="uk-input uk-form-large form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                            <label><input class="uk-checkbox" type="checkbox"> I agree the Terms and Conditions.</label>
                        </div>

                        <div class="uk-margin">
                            <button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1">{{ __('Register') }}</button>
                        </div>


                        <div class="uk-text-small uk-text-center">
                            Already have an account? <a href="#" uk-switcher-item="0">Log in</a>
                        </div>
                    </form>
                </li>

                <!-- Forgot your password -->
                <li>
                    <h3 class="uk-card-title uk-text-center">Forgot your password?</h3>
                    <p class="uk-text-center uk-width-medium@s uk-margin-auto">Enter your email address and we will send you a link to reset your password.</p>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="uk-margin">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon" uk-icon="icon: mail"></span>
                                <input id="email_forgot" class="uk-input uk-form-large form-control @error('email') is-invalid @enderror" name="email" type="email" placeholder="Email address" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="uk-margin">
                            <button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1">{{ __('Send Password Reset Link') }}</button>
                        </div>

                        <div class="uk-text-small uk-text-center">
                            <a href="#" uk-switcher-item="0">Back to login</a>
                        </div>

                    </form>
                </li>
            </ul>
        </div>

    </div>
</div>

@endsection