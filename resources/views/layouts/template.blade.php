<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{mix('css/app.css')}}" />
    <title>@yield('title', 'Welcome to The Student Administration')</title>
</head>
<body>
{{--  Navigation  --}}
@include('shared.navigation')
<main class="container mt-3 ">
    @yield('main','page under construction')
</main>"
{{--  Footer  --}}
@include('shared.footer')
<script src="{{ mix('js/app.js') }}"></script>
@yield('script_after')
{{--if debug is true in the .env file, always add novalidate to forms--}}
@if( env("APP/DEBUG"))
    <script>
        $("form").attr("novalidate", "true");
    </script>
@endif
</body>
</html>
