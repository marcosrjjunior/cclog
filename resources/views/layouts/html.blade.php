<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        CcLog @yield('title')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Changelog for your projects" />
    <meta name="keywords" content="projects, status, changelog, log" />
    <meta name="author" content="CcLog" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="/favicon.ico">

    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,400italic,700' rel='stylesheet' type='text/css'>

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ elixir('css/animate.css') }}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ elixir('css/icomoon.css') }}">
    <!-- Simple Line Icons -->
    <link rel="stylesheet" href="{{ elixir('css/simple-line-icons.css') }}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ elixir('css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ elixir('css/style3.css') }}">
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">

    <!-- Modernizr JS -->
    <script src="{{ elixir('js/modernizr-2.6.2.min.js') }}"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    </head>
    <body>
        @yield('content')

        @include('partials.footer')

        <!-- jQuery -->
        <script src="{{ elixir('js/jquery.min.js') }}"></script>
        <!-- jQuery Easing -->
        <script src="{{ elixir('js/jquery.easing.1.3.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ elixir('js/bootstrap.min.js') }}"></script>
        <!-- Waypoints -->
        <script src="{{ elixir('js/jquery.waypoints.min.js') }}"></script>
        <!-- Stellar Parallax -->
        <script src="{{ elixir('js/jquery.stellar.min.js') }}"></script>

        <!-- Main JS (Do not remove) -->
        <script src="{{ elixir('js/main.js') }}"></script>
    </body>
</html>