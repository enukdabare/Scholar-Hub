<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Scholar Hub')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">

    @php
        $hideHeaderFooter = in_array(Route::currentRouteName(), ['login', 'signup']);
    @endphp

    @unless($hideHeaderFooter)
        @include('partials.header')
    @endunless

    <main class="min-h-screen">
        @yield('content')
    </main>

    @unless($hideHeaderFooter)
        @include('partials.footer')
    @endunless
    
</body>
</html>
