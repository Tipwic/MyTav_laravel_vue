<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/uikit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/uikit-rtl.min.css') }}">

    <!-- sources -->
    <script src="{{ asset('assets/js/uikit.min.js') }}"></script>
    <script src="{{ asset('assets/js/uikit-icons.min.js') }}"></script>

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>

<body class="antialiased">

    <nav class="uk-margin uk-navbar uk-margin-remove-bottom uk-background-secondary uk-light" uk-navbar="">
        <div class="uk-navbar-left">

            <ul class="uk-navbar-nav">
                <li>
                    <a href="{{ url('welcome') }}" class="text-sm text-gray-700 underline">{{ config('app.name') }}</a>
                </li>
            </ul>
        </div>
        <div class="uk-navbar-right">

            <ul class="uk-navbar-nav">
                <li>
                    <a href="{{ route('register') }}" class="text-sm text-gray-700 underline" uk-icon="icon: sign-in"></a>
                </li>
            </ul>

        </div>
    </nav>

    <main class="py-4" uk-height-viewport="offset-top: true; offset-bottom: true">
        @yield('content')
    </main>

    <footer id="page-footer"  uk-sticky>
        <div class="uk-container uk-padding-small">
            <p class="uk-text-small">copyright(c).</p>
        </div>
    </footer>
</body>

</html>