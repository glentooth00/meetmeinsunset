{{-- resources/views/includes/header.blade.php --}}

<link rel="icon" href="{{ asset('images/tabicon.png') }}">

{{-- Example: CSS, fonts, meta extras --}}
<link rel="stylesheet" href="/css/app.css">

<!-----------------------------------------------------------
-- animate.min.css by Daniel Eden (https://animate.style)
-- is required for the animation of notifications and slide out panels
-- you can ignore this step if you already have this file in your project
--------------------------------------------------------------------------->

<link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />

<link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />

<script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>

{{-- Optional: custom styles --}}
<style>
    body {
        background-color: #f5f5f5;
    }
</style>