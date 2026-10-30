
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'MeetMeinSunset | Medical Apparel' }}</title>

    <meta name="description"
          content="Discover premium medical scrubs, uniforms, lab coats, and healthcare apparel at MeetMeinSunset.">

    @vite(['resources/css/app.css', 'resources/js/app.js'])  
</head>

<body class="min-h-screen bg-white font-sans text-slate-800 antialiased">

    <x-store.announcement-bar />

    <x-store.navbar />

    <main class="min-h-[60vh]">
        {{ $slot }}
    </main>

    <x-store.footer />

</body>
</html>
