<!DOCTYPE html>

<html lang="en">

<head>
    
    @include('frontend.layouts.head')
    <title>@yield('title')</title>
    @yield('style')
    @vite('resources/css/app.css')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body class="font-Kanit">

    @include('frontend.layouts.navbar')

   

    <div class="overflow-hidden">
    @yield('content')</div>

    @include('frontend.layouts.footer')

    @yield('script')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <script>
        AOS.init();
    </script>
</body>

</html>
