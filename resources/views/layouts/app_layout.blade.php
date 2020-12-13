<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <!-- styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/uikit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/uikit-rtl.min.css') }}">

    <!-- token -->
    <script type="text/javascript">
        window.csrf_token = "{{ csrf_token() }}";
        window.CurrentUserId = "{{ Auth::user()->id }}"
    </script>

</head>

<body>
    <div id="app">
        <v-header></v-header>
        <v-aside_nav></v-aside_nav>
        <v-modal></v-modal>
        <main uk-height-viewport="offset-top: true; offset-bottom: true">

            <div class="uk-container uk-margin-small-top">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

                <router-view></router-view>
            </div>
        </main>

        <footer id="page-footer" uk-sticky>
            <div class="uk-container uk-padding-small">
                <p class="uk-text-small">copyright(c).</p>
            </div>
        </footer>

    </div>

    <!-- sources -->
    <script src="{{ asset('assets/js/uikit.min.js') }}"></script>
    <script src="{{ asset('assets/js/uikit-icons.min.js') }}"></script>
    <script src="/js/app.js"></script>
</body>

</html>