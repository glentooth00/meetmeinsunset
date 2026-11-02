<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Admin Login' }} | MeetMeinSunset</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen bg-[#F4F8FA] antialiased">

    {{ $slot }}

</body>
</html>