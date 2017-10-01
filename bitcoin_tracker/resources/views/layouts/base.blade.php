<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bitcoin Tracker - @yield('title')</title>

        <link href="/css/app.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('index') }}">Bitcoin Tracker</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <p class="navbar-text">
                        @if ($last_update_tracker)
                            <span id="last_update_label">Última actualización</span>
                            <span id="last_update" class="label label-primary">{{ $last_update_tracker->created_at }}</span>
                        @else
                            <span id="last_update_label">No hay datos.</span>
                            <span id="last_update" class="label label-primary"></span>
                        @endif
                    </p>
                </div>
            </div>
        </nav>

        <div class="container">
            @section('canvas_block')
            @show
        </div>

        <!--
        <script src="/js/manifest.js"></script>
        <script src="/js/vendor.js"></script>
        -->
        <script src="/js/app.js"></script>
        <!--
        <script src="{{ asset('js/app.js') }}"></script>
        -->
    </body>
</html>
