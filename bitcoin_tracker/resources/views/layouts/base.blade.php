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
                    <p class="navbar-text">Última actualización <span id="last_update">A</span></p>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <h1 class="col-lg-12 text-center">
                    Probando
                </h1>
                <div class="col-lg-12">
                    test
                </div>
            </div>
        </div>

        <script src="/js/manifest.js"></script>
        <script src="/js/vendor.js"></script>
        <script src="/js/app.js"></script>
    </body>
</html>
