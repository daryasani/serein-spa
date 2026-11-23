<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Stalinist+One&amp;display=swap" rel="stylesheet">
    @stack('styles')
</head>
<body>
    @include('partials.navigation')

    @yield('content')

    @include('partials.footer')

    @stack('scripts')
</body>
</html>
