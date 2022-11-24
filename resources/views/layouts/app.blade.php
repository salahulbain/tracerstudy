<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.meta')
    <title>@yield('title') | {{ config('app.name', 'Tracer Study') }}</title>
    @stack('addon-before-style')
    @include('includes.style')
    @stack('addon-after-style')
</head>

<body>
    <div id="app">
        @include('includes.sidebar')
        <div id="main">
            @yield('content')
            @include('includes.footer')
        </div>
    </div>
    @stack('addon-before-script')
    @include('includes.script')
    @stack('addon-after-script')
</body>

</html>