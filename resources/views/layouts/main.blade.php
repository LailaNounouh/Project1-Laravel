<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100">

@include('layouts.navigation')

<main class="max-w-7xl mx-auto py-6 px-4">
    @yield('content')
</main>

</body>
</html>
