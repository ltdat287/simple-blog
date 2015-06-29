<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('head.title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
    @yield('head.css')
</head>
<body>

    @include('partials.navbar')
    @yield('body.content')
    @include('partials.footer')

    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    @yield('body.js')
</body>
</html>