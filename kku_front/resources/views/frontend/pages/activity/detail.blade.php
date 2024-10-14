@extends('frontend.layouts.layout-main')
@section('title', 'Activity')
@section('style')
    @vite('resources/css/activity.css')
@endsection
@section('content')

    <section class="relative w-4/5 max-sm:w-[90%]  mx-auto mt-[5rem] max-xl:mt-[4rem] py-12 ">
        <div class="flex gap-6 max-xl:flex-col">
            <div class="bg-[#F7FAF3] flex flex-col justify-center items-left px-20 max-xl:p-6 shadow-md w-full max-xl:order-2"
                data-aos="fade-right" data-aos-duration="3000">
                <p class="text-[#23404A] font-[500] text-left text-3xl max-xl:text-xl max-sm:text-lg mb-4">
                    {{ $post->title }}</p>

                <div class="flex flex-col gap-4">
                    <div class="flex justify-start gap-8 max-xl:gap-1 max-md:flex-col text-lg max-md:text-[1rem]">
                        <p class="text-[#23404A] font-medium text-left  w-[150px]  max-xl:w-[120px]">สถานที่จัดงาน :</p>
                        <p class="text-[#23404A] font-light text-left ">{{ $post->description }}</p>
                    </div>
                    <div class="flex justify-start gap-8 max-xl:gap-1 max-md:flex-col text-lg max-md:text-[1rem]">
                        <p class="text-[#23404A] font-medium text-left w-[150px]  max-xl:w-[120px]">กำหนดเวลา :</p>
                        <p class="text-[#23404A] font-light text-left ">
                            {{ \Carbon\Carbon::parse($post->date_begin_display)->locale('th')->isoFormat('D MMMM YYYY') }}
                            -
                            {{ \Carbon\Carbon::parse($post->date_end_display)->locale('th')->isoFormat('D MMMM YYYY') }}
                        </p>
                    </div>
                    <div class="flex justify-start gap-8 max-xl:gap-1 max-md:flex-col text-lg max-md:text-[1rem]">
                        <p class="text-[#23404A] font-medium text-left w-[150px]  max-xl:w-[120px]">Google Drive :</p>
                        <p class="text-[#23404A] font-light text-left">
                            <a href="{{ $post->iframe }}">{{ $post->iframe }}</a>
                        </p>
                    </div>
                </div>
            </div>


            <div class="w-[50%] max-xl:max-w-full max-xl:max-h-[300px] h-[350px] max-xl:w-full x-auto shadow-md"
                data-aos="fade-left" data-aos-duration="3000">
                <img src="{{ url($post->thumbnail_link) }}" alt="" class="w-full h-full object-cover">
            </div>
        </div>
    </section>

    <section class="relative z-50 py-16 max-sm:py-12">
        <div class="w-4/5 max-sm:w-[90%] mx-auto flex flex-col gap-12 ">
            <div class="flex flex-col gap-6">
                <p class="text-[#84B750] text-center text-xl max-lg:text-lg max-sm:text-[1rem] z-40 max-md:px-2"
                    data-aos="zoom-in" data-aos-duration="3000">วันที่ 13 พฤศจิกายน 2567</p>


                <div class="relative z-40 w-[600px] max-sm:w-full mx-auto">
                    <p class="text-[#23404A] font-[500] text-center text-2xl max-md:text-[1.15rem] z-40 max-md:px-2"
                        data-aos="zoom-in" data-aos-duration="3000">{{ $post->title }}
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-4 max-xl:grid-cols-3 max-lg:grid-cols-2 max-sm:grid-cols-1 gap-4 place-items-center z-50 relative"
                id="swpImg">
                @foreach ($images as $image)
                    <div class="relative w-full h-[300px] max-lg:h-[250px] mx-auto shadow-md cursor-pointer"
                        data-image="{{ url($image->image_link) }}" data-aos="flip-left" data-aos-easing="ease-out-cubic"
                        data-aos-duration="2000">
                        <img src="{{ url($image->image_link) }}" alt="" class="w-full h-full object-cover">
                        <div
                            class="absolute inset-0 bg-gradient-to-b from-[#ffffff] to-[#84B750] opacity-0 hover:opacity-65 flex justify-center items-center transition-opacity duration-300">
                            <img src="/images/eye.png" alt="" class="w-auto h-auto max-w-12 max-h-12 opacity-100">
                        </div>
                    </div>
                @endforeach

            </div>




            <div class="flex justify-center items-center gap-2 mb-12">
                {{-- ปุ่มไปหน้าก่อนหน้า --}}
                @if($images->onFirstPage())
                    <span class="flex justify-center items-center border border-[#84B750] w-10 h-10 rounded-md text-xl font-bold text-gray-400 cursor-not-allowed"> < </span>
                @else
                    <a href="{{ $images->previousPageUrl() }}" class="flex justify-center items-center border border-[#84B750] w-10 h-10 rounded-md text-xl font-bold hover:bg-[#84B750] hover:text-white"> < </a>
                @endif
            
                {{-- ปุ่มหมายเลขหน้า --}}
                @foreach($images->getUrlRange(1, $images->lastPage()) as $page => $url)
                    @if($page == $images->currentPage())
                        <span class="flex justify-center items-center border border-[#84B750] w-10 h-10 rounded-md text-lg font-semibold bg-[#84B750] text-white cursor-pointer">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="flex justify-center items-center border border-[#84B750] w-10 h-10 rounded-md text-lg font-semibold hover:bg-[#84B750] hover:text-white">{{ $page }}</a>
                    @endif
                @endforeach
            
                {{-- ปุ่มไปหน้าถัดไป --}}
                @if($images->hasMorePages())
                    <a href="{{ $images->nextPageUrl() }}" class="flex justify-center items-center border border-[#84B750] w-10 h-10 rounded-md text-xl font-bold hover:bg-[#84B750] hover:text-white"> > </a>
                @else
                    <span class="flex justify-center items-center border border-[#84B750] w-10 h-10 rounded-md text-xl font-bold text-gray-400 cursor-not-allowed"> > </span>
                @endif
            </div>
        </div>

        <img src="/images/home/Group 50.png" alt="" class="absolute top-4 left-0 w-40">
        <img src="/images/home/Group 22.png" alt="" class="absolute bottom-36 right-0 w-24">
        <img src="/images/home/Group 49.png" alt=""
            class="absolute  -bottom-40 right-[40rem] max-lg:right-[20rem] max-sm:right-[8rem] w-80">

    </section>

    <!-- Swiper Popup -->
    <div id="swiperPopup" class="fixed inset-0 bg-black bg-opacity-70 hidden justify-center items-center z-[99]">
        <div class="h-screen flex flex-col justify-center items-center">
            <div
                class="swiper-container mx-auto my-auto w-[900px] h-[700px] max-lg:w-[750px] max-lg:h-[550px] max-xs:w-[400px] max-es:w-[350px] max-sm:h-[350px] relative flex justify-center flex-col items-center">
                <div class="swiper-wrapper">
                </div>
                <p id="closeModal"
                    class="text-white text-lg hover:scale-105 -bottom-12 relative cursor-pointer transition-all ease-in-out before:transition-[width] before:ease-in-out before:duration-700 before:absolute before:bg-[#bceb77] before:origin-center before:h-[2px] before:w-0 hover:before:w-[50%] before:bottom-0 before:left-[50%] after:transition-[width] after:ease-in-out after:duration-700 after:absolute after:bg-[#bceb77] after:origin-center after:h-[2px] after:w-0 hover:after:w-[50%] after:bottom-0 after:right-[50%]">
                    ปิด X</p>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

            </div>
        </div>
    </div>


@endsection
@section('script')
    @vite('resources/js/activity/swiper.js')
@endsection
