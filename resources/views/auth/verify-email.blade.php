@extends('layouts.app')

@section('content')

<div class="uk-flex uk-flex-center">
<div class="uk-card uk-card-default uk-width-1-2@m">
    <div class="uk-card-header">
        <div class="uk-grid-small uk-flex-middle" uk-grid>

            <div class="uk-width-expand">
                <h3 class="uk-card-title uk-margin-remove-bottom">{{ __('Verify Your Email Address') }}</h3>
            </div>
        </div>
    </div>
    <div class="uk-card-body">
        @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
        @endif
        <p>
            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
        </p>
    </div>
    <div class="uk-card-footer">
        <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1">{{ __('click here to request another') }}</button>

        </form>
    </div>
</div>
</div>

@endsection