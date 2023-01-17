@vite('resources/css/app.css')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Αφίσα "Interview"</title>


</head>

<body class="bg-gray flex justify-center">
    <img src="{{ asset('images/poster.jpg') }}" alt="poster" class="h-full">
</body>


</html>
