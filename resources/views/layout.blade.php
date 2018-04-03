<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Include CSRF token to be used by any HTTP requests from JavaScript -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Contact Form</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css"
          integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

</head>
<body class="app-body">

<!-- dom element for VueJS -->
<div id="app" v-cloak>

    <!-- yield page content -->
    @yield('content')

</div>

<script type="application/javascript" src="{{ asset('js/app.js') }}"></script>

</body>
</html>
