<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Game App')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/nav.js')
    @vite('resources/js/remove_success.js')
    @yield('imports')
</head>
<body>
    
    @include('components.nav')

    @yield('main')

    @yield('footer')

</body>
</html>