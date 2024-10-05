@extends('frontend.layouts.layout-main')
@section('title', 'Seminar')
@section('style')
    {{-- <link rel="stylesheet" href="/css/aboutus.min.css"> --}}
@endsection
@section('content')

    <section class="mt-[4.5rem] max-xl:mt-[3rem] w-full h-[500px] max-xl:h-[350px] max-sm:h-[250px] relative z-50">
        <div class="absolute inset-0 z-50 flex flex-col justify-center items-center gap-y-4 max-sm:gap-y-2 px-4">
            <p class="text-white text-6xl max-xl:text-3xl max-md:text-2xl  font-bold text-center" data-aos="zoom-in"
                data-aos-duration="3000">
                การประชุมและนิทรรศการครั้งที่ 1
            </p>
            <p class="text-white text-2xl max-2xl:text-xl max-lg:text-lg max-sm:text-[1rem] font-medium text-center"
                data-aos="zoom-in" data-aos-duration="3000">
                เกี่ยวกับนวัตกรรมเพื่อสุขภาพและความเป็นอยู่ที่ดี :<br>
                เสริมพลังการประดิษฐ์สู่นวัตกรรมเพื่อคุณภาพชีวิต
            </p>
        </div>

        <img src="/images/banner/image1.png" alt="" class="w-full h-full absolute object-cover">
    </section>


    <section class="flex flex-col gap-4 relative  pt-10 bg-white ">
        <p class="text-[#23404A] font-bold text-center text-2xl max-md:text-xl max-sm:text-lg z-40 max-md:px-2"
            data-aos="zoom-in" data-aos-duration="3000">{{$post->title}}</p>
        <p class="text-[#23404A] font-medium text-center text-2xl max-2xl:text-xl max-lg:text-lg max-sm:text-[1rem] z-40 max-md:px-2"
            data-aos="zoom-in" data-aos-duration="3000">{{$post->keyword}}</p>
        <div class="flex flex-col w-[70%] max-md:w-full mx-auto my-12 items-center">

            <div class="flex max-xl:flex-col gap-6 justify-between items-center w-full">

                <div class="swiper swiper-container w-full ">
                    <div class="swiper-wrapper rounded-2xl sm:p-6 flex sm:justify-start  ">
                        @foreach ($post['images'] as $image)
                            <div class="swiper-slide sm:px-6">
                                <div
                                    class="relative w-[600px] h-[400px] max-yy:w-[450px] max-yy:h-[350px] max-xl:w-full max-xl:h-[400px] max-md:w-[400px] max-md:h-[350px] max-sm:w-full max-sm:h-[350px] px-4 max-md:rounded-lg">
                                    <div
                                        class="bg-[#FFCAAE] drop-shadow-md w-full h-full rounded-2xl absolute -left-6 top-6 z-10 max-sm:hidden">
                                    </div>
                                    <img src="{{url($image->image_link)}}" alt=""
                                        class="w-full h-full relative z-20 rounded-2xl drop-shadow-md">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

                <div class="w-full flex flex-col gap-y-6 justify-between max-xl:mt-6 px-4 " data-aos="fade-left"
                    data-aos-duration="3000">
                    <div class="flex gap-6 items-center">
                        <div class="w-[50px] h-[50px]">
                            <img src="/images/home/meeting-call.png" alt="" class="w-full h-full">
                        </div>
                        <p class="text-[#4BCAFF] font-bold text-3xl max-md:text-lg">ที่มาของการสัมมนา</p>
                    </div>
                    <div class="flex flex-col gap-y-6 text-[1rem] indent-8">
                        <p>{!! nl2br(e($post->description)) !!}</p>
                    </div>

                </div>
            </div>

            <div class="mt-12  max-sm:px-4 flex flex-col gap-y-2 w-full" data-aos="fade-up"
                data-aos-anchor-placement="top-bottom">
                <p class="text-[#23404A] font-semibold text-2xl max-md:text-lg">หลักการและเหตุผล</p>

                <div class="flex flex-col gap-y-6 text-[1rem] indent-8">
                    {!! $post->content !!}
                </div>
            </div>
        </div>

        <img src="/images/home/Group 50.png" alt="" class="absolute top-4 left-0 w-40">
        <img src="/images/home/Group 22.png" alt="" class="absolute bottom-36 right-0 w-24">
        <img src="/images/home/Group 49.png" alt=""
            class="absolute  -bottom-40 right-[40rem] max-lg:right-[20rem] max-sm:right-[8rem] w-80">
    </section>

    <section class=" bg-white flex flex-col gap-4 Z-50  pb-8 relative">
        <div class="absolute w-full h-full">
            <img src="/images/bg1.png" alt="Your Image" class="w-full h-full object-cover">
        </div>
        <p class="text-white font-bold text-center text-3xl  z-50 max-md:px-2 pt-10" data-aos="zoom-in"
            data-aos-duration="3000">{{$postManage->title}}</p>
        <p class="text-white font-medium text-center text-lg  max-sm:text-[1rem] z-40 w-4/5 mx-auto" data-aos="zoom-in"
            data-aos-duration="3000">{{$postManage->description}}</p>

        <div class="w-4/5  mx-auto py-10 max-ex:py-4 content-center grid grid-cols-6 max-lg:grid-cols-3 max-md:grid-cols-2 gap-y-2 z-50"
            data-aos="zoom-in" data-aos-duration="3000">
            @foreach ($postManage['images'] as $image)
                <div class="flex justify-center items-center flex-col gap-2">
                    <div
                        class="w-[160px] h-[160px] max-xl:w-[120px] max-xl:h-[120px] rounded-full p-1 bg-white items-center flex justify-center">
                        <img src="{{url($image->image_link)}}" alt="w-full h-full">
                    </div>
                    <p class="text-white font-medium text-center text-lg  max-sm:text-[1rem] z-40 w-4/5 mx-auto">{{$image->title}}</p>
                </div>
            @endforeach
        </div>


    </section>

    {{-- @if ($postsupport) --}}
    <section class=" py-10 mt-15 bg-white items-center relative z-50">
        <p class="text-[#23404A] font-bold text-center text-4xl max-md:text-2xl max-md:px-2" data-aos="zoom-in"
            data-aos-duration="3000">{{$postsupport->title}}</p>
        <div class="relative z-30 items-center mt-8">
            <div class="swiper swiper1 items-center w-11/12 mx-auto">

                <div class="swiper-wrapper w-full mx-auto flex">
                    @foreach ($postsupport->images as $image)
                        <div class="swiper-slide flex flex-col justify-center">
                            <div class="flex justify-center">
                                <div class="w-[200px] h-[120px] flex justify-center" data-aos="zoom-in"
                                    data-aos-duration="3000">
                                    <img src="{{ url($image->image_link) }}" alt=""
                                        class="w-full h-full">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="swiper-button-next swiper-button-next1"></div>
            <div class="swiper-button-prev swiper-button-prev1"></div>
        </div>
    </section>
    {{-- @endif --}}

@endsection
@section('script')
    @vite('resources/js/seminar/swiper.js')
@endsection
