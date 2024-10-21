@extends('frontend.layouts.layout-main')
@section('title', 'Accommodation')
@section('style')
    {{-- <link rel="stylesheet" href="/css/aboutus.min.css"> --}}
@endsection
@section('content')

    <section class="mt-[4.5rem] max-xl:mt-[3rem] w-full h-[500px] max-xl:h-[350px] max-sm:h-[250px] relative z-50">
        <div class="absolute inset-0 z-50 flex flex-col justify-center items-center gap-y-4 max-sm:gap-y-2 px-4">
            <p class="text-white text-6xl max-xl:text-3xl  font-bold text-center" data-aos="zoom-in" data-aos-duration="3000">
                {{ $cate->cate_title }}
            </p>
        </div>

        <img src="{{ url($imageBanner->ad_image ?? 'images/banner/image122.png') }}" alt=""
            class="w-full h-full absolute object-cover ">
    </section>

    <section class="w-4/5 max-sm:w-[90%] mx-auto relative h-auto items-center flex justify-center">
        <div class="flex justify-center items-center absolute">
            <div class="bg-[#B8D88F] w-[150px] h-[100vh] "></div>
        </div>

        <div class="swiper-container w-full h-[100vh] max-xl:py-4">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper ">
                @foreach ($hotels as $hotel)
                    <div class="swiper-slide max-lg:!flex max-lg:items-center max-lg:flex-col gap-y-6 max-lg:relative max-lg:py-10  w-full sm:overflow-auto"
                        style="word-break: break-word; white-space: normal;">
                        <!-- Slide Content -->
                        <div data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="3000"
                            class="max-lg:order-2 bg-white border sm:p-8 rounded-lg shadow-lg lg:absolute z-30 flex flex-col gap-y-6 justify-start p-4  w-[650px] h-[450px] max-uu:w-[550px] max-uu:h-[380px] max-uu:top-[22rem] right-[25rem]  max-uu:right-[15rem] max-yi:right-0 max-yy:right-[5rem] top-[25rem]  max-xl:right-0 max-xl:max-w-[450px]  max-xl:max-h-[350px] max-sm:max-w-[350px]  max-sm:max-h-[350px]">
                            <div class="">
                                <p class="text-[#84B750] text-3xl max-md:text-2xl font-semibold">{{ $hotel->title }}</p>
                                <p class="text-[#23404A] text-lg max-md:text-[1rem] font-medium">{{ $hotel->keyword }}</p>
                            </div>
                            <div class="flex flex-col gap-4 overflow-auto">
                                <div class="flex gap-2 items-center">
                                    <img src="/images/icon/line1.png" alt="" class="w-6 h-6">
                                    <p class="text-[1rem]">LINE ID: {{ $hotel->link_line }}</p>
                                </div>
                                <div class="flex gap-2 items-center">
                                    <img src="/images/icon/90.png" alt="" class="w-6 h-6">
                                    <p class="text-[1rem]">ที่อยู่ : {{ $hotel->description }}</p>
                                </div>
                                <a href="tel:043-320-320" class="flex  gap-2 items-center">
                                    <img src="/images/icon/tel.png" alt="" class="w-6 h-6">
                                    <p class="text-[1rem]">โทรศัพท์ : {{ $hotel->phonenumber }}</p>
                                </a>
                                <a href="/{{ $hotel->iframe }}" target="_blank" class="flex gap-2 justify-center items-strat">
                                    <img src="/images/icon/map.png" alt="" class="w-6 h-6">
                                    <p class="text-[1rem]">ลิ้งก์แผนที่ : {{ $hotel->iframe }}</p>
                                </a>
                            </div>
                        </div>
                        <!-- Image Slider -->
                        <div
                            class="max-lg:order-1 w-[690px] h-[550px] max-uu:w-[550px]  max-uu:h-[380px] lg:absolute rounded-lg shadow-lg left-[20rem] top-[15rem] max-uu:left-[15rem] max-uu:top-[12rem] max-yy:left-[5rem] max-yi:left-0  max-yy:top-[6rem] max-xl:left-0 max-xl:w-[450px]  max-xl:h-[350px] max-sm:max-w-[350px]  max-sm:max-h-[350px]">
                            <img src="{{ url($hotel->thumbnail_link) }}" alt=""
                                class="w-full h-full rounded-lg object-cover">
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- If you want Pagination or Navigation buttons -->
            <div class="swiper-pagination"></div>
            {{-- <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div> --}}
        </div>
    </section>



    <section class="relative bg-[#F4FCFF] flex flex-col gap-4 Z-50 pb-4">
        <p class="text-[#23404A] font-bold text-center text-4xl max-md:text-2xl z-50 max-md:px-2 pt-16 max-sm:pt-8"
            data-aos="zoom-in" data-aos-duration="3000">{{ $location->title }}</p>
        <div class="shadow-md w-full h-[450px] max-md:h-[300px] max-sm:h-[200px]">
            {!! $location->iframe !!}
        </div>
    </section>

    <section class="w-4/5 mx-auto relative bg-white flex flex-col justify-center items-center gap-4 Z-50 pb-12">
        <p class="text-[#23404A] font-bold text-center text-4xl max-md:text-2xl z-50 max-md:px-2 pt-16 max-sm:pt-8"
            data-aos="zoom-in" data-aos-duration="3000">{{ $location->keyword }}</p>
        <div class="mt-4 shadow-md  yy:w-[1000px] w-auto h-full  boeder relative cursor-pointer previewImage"
            id="previewImage" data-aos="zoom-in" data-aos-duration="3000">
            <img src="{{ $location->thumbnail_link }}" alt="" class="w-full h-full hadow-md ">
            <div
                class="absolute inset-0 bg-gradient-to-b from-[#ffffff] to-[#84B750] opacity-0 hover:opacity-65 flex justify-center items-center transition-opacity duration-300">
                <img src="/images/eye.png" alt="" class="w-auto h-auto max-w-12 max-h-12 opacity-100">
            </div>
        </div>


        @foreach ($location['images'] as $image)
            <div class="mt-4 shadow-md  yy:w-[1000px] w-auto h-full  border relative cursor-pointer previewImage"
                data-aos="zoom-in" data-aos-duration="3000">
                <img src="{{ $image->image_link }}" alt="" class="w-full h-full shadow-md ">
                <div
                    class="absolute inset-0 bg-gradient-to-b from-[#ffffff] to-[#84B750] opacity-0 hover:opacity-65 flex justify-center items-center transition-opacity duration-300">
                    <img src="/images/eye.png" alt="" class="w-auto h-auto max-w-12 max-h-12 opacity-100">
                </div>
            </div>
        @endforeach
    </section>


    <!-- Modal -->
    @foreach ($location['images'] as $image)
        <div id="imageModal" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-75 z-[999]">
            <div
                class="relative my-6 w-auto h-full max-yy:w-auto max-yy:h-[700px] max-lg:w-full max-lg:h-auto max-yy:py-8  max-2xl:mx-6 max-sm:mx-2 mx-auto ">
                <button
                    class="absolute yy:top-5 top-0 right-0 pb-1 text-white text-[2rem] bg-red-500 w-[30px] h-[30px] px-2 rounded-full flex justify-center items-center hover:scale-110"
                    id="closeModal">&times;</button>
                <img src="{{ $image->image_link }}" alt="Image Preview" class="w-full h-full py-[1rem]" id="modalImage">
            </div>
        </div>
    @endforeach

@endsection
@section('script')
    @vite('resources/js/accom/accom.js')

@endsection
