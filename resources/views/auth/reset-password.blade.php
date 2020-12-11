@extends('layouts.welcome_layout')

@section('content')

<div class="uk-section uk-section-muted uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
	<div class="uk-width-1-1">
		<div class="uk-container">
			<div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
				<div class="uk-width-1-1@m">
					<div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
						<h3 class="uk-card-title uk-text-center">{{ __('Reset Password') }}</h3>
						<form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ request()->route('token') }}">

							<div class="uk-margin">
								<div class="uk-inline uk-width-1-1">
									<span class="uk-form-icon" uk-icon="icon: mail"></span>
									<input id="email" type="email" class="uk-input uk-form-large form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
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
									<input id="password" type="password" class="uk-input uk-form-large form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
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
									<input id="password-confirm" type="password" class="uk-input uk-form-large form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            
							<div class="uk-margin">
								<button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1">{{ __('Reset Password') }}</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection