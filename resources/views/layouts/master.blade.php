<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Icon --}}
    <link rel="shortcut icon" href="/assets/images/logo.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    @include('../partials/styles')
    <title>Laracamp</title>
</head>
<body>
    @include('../partials/navbar')
    @yield('content')
    @include('../partials/scripts')
</body>
</html>