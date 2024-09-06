<?php

    // $language = Request::segment(1);

    // $website = new \App\Assets\Website;

    // $website = $website->settings();

?>

<!DOCTYPE html>

<html lang="en">

<head>
    @include('frontend.layouts.head')
    <title>@yield('title')</title>
    @yield('style')
    @vite('resources/css/app.css')
</head>

<body>

    @include('frontend.layouts.navbar')

    @include('frontend.layouts.swiper')

    <div class="max-w-screen-xl mx-auto">

        @yield('content')

    </div>

    {{-- @include('frontend.layouts.footer') --}}

    @yield('script')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
</body>

</html>

