@extends('layouts.welcome_layout')

@section('content')


  <div class="uk-background-contain uk-background-muted uk-height-medium uk-panel uk-flex uk-flex-center uk-flex-middle" style="background-color: white;">
    <img src="{{ asset('images/fond.jpg') }}" alt="" style="height: 100%;">
  </div>

<div class="uk-child-width-1-2@s uk-grid-match" uk-grid>
  <!--~~~-->
  <div>
    <div class="uk-card uk-card-hover uk-card-body">
      <h3 class="uk-card-title">Techno</h3>
      <p>- Backend : Laravel 8</p>
      <p>- Frontend : VueJs</p>
      <p>- Authentification : Fortify</p>
      <p>- CSS : UiKit</p>
    </div>
  </div>

  <!--~~~-->
  <div>
    <div class="uk-card uk-card-default uk-card-hover uk-card-body">
      <h3 class="uk-card-title">Settings .env mail</h3>
      <p> MAIL_MAILER=smtp
        <p>MAIL_HOST=smtp.mailtrap.io</p>
        <p>MAIL_PORT=2525</p>
        <p>MAIL_USERNAME=************</p>
        <p>MAIL_PASSWORD=************</p>
        <p>MAIL_ENCRYPTION=tls</p>
        <p>MAIL_FROM_ADDRESS=test_app@mt.com</p>
        <p>MAIL_FROM_NAME="${APP_NAME}"</p>
    </div>
  </div>

  <!--~~~-->
  <div>
    <div class="uk-card uk-card-secondary uk-card-hover uk-card-body uk-light">
      <h3 class="uk-card-title">commands</h3>
      <p>php artisan update</p>
      <p>php artisan migrate</p>
      <p>php artisan db:seed</p>
      <p>php artisan serve</p>
      <p>npm i && npm audit fix</p>
      <p>npm run dev</p>
    </div>
  </div>

  <!--~~~-->
  <div>
    <div class="uk-card uk-card-primary uk-card-hover uk-card-body uk-light">
      <h3 class="uk-card-title">TODO</h3>
      <p>- test</p>
      <p>- Authetification API (non géré par fortify)</p>
      <p>.....</p>
    </div>
  </div>
</div>
</div>

@endsection