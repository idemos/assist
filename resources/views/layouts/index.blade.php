<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/xhtml">
<head>
@include('includes/head')
</head>
<body class="dx-viewport">
    <div class="demo-container">
        @yield('content')
    </div>

@include('includes/footer')
@yield('footer_script')
</body>
</html>