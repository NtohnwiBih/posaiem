<!DOCTYPE html>
<html lang="en">
<head>
@include('frontend.layouts.head')
</head>
<body> 
        @include('frontend.layouts.header')
        @yield('content')
        @include('frontend.layouts.footer')
    @include('frontend.layouts.bottom')
</body>
</html>