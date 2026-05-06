<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Laravel'))</title>

    @include('includes.header') {{-- only partials now --}}
</head>
<body>

    {{-- Navbar --}}
     <x-store-navbar />

    <main class="p-6">
        @yield('content')
    </main>

    @include('includes.footer')

</body>
</html>