@extends('frontend.layouts.layout-main')
@section('title', 'Schedule')
@section('style')
    {{-- <link rel="stylesheet" href="/css/aboutus.min.css"> --}}
@endsection
@section('content')
    <section class="mt-[4.5rem] max-xl:mt-[3rem] w-full h-[500px] max-xl:h-[350px] max-sm:h-[250px] relative z-50">
        <div class="absolute inset-0 z-50 flex flex-col justify-center items-center gap-y-4 max-sm:gap-y-2 px-4">
            <p class="text-white text-6xl max-xl:text-3xl max-md:text-2xl  font-bold text-center" data-aos="zoom-in"
                data-aos-duration="3000">{{$seo->title}}</p>
        </div>

        <img src="{{ url($imageBanner->ad_image ?? 'images/banner/image122.png') }}" alt="" class="w-full h-full absolute object-cover">
    </section>


    <section class="flex flex-col gap-4 relative pt-32 max-sm:pt-20 bg-white ">



        <div class="relative z-40 w-[550px] max-sm:w-[350px] mx-auto">
            <p class="text-[#23404A] font-bold text-center text-3xl max-md:text-xl z-40 max-md:px-2" data-aos="zoom-in"
                data-aos-duration="3000">{{$seo->title}}</p>
        </div>
        <div class="relative z-40 w-[600px] max-sm:w-full mx-auto">
            <p class="text-[#23404A] text-center text-xl max-lg:text-lg max-sm:text-[1rem] z-40 max-md:px-2"
                data-aos="zoom-in" data-aos-duration="3000">{{$seo->description}}</p>
        </div>

        <div
            class="my-12 z-50 flex flex-col gap-6 max-xl:gap-y-6 max-xl:grid max-2xl:grid-cols-2 max-md:grid-cols-1 max-lg:gap-4 w-4/5 max-lg:w-[90%] mx-auto">
            @foreach ($schedule as $index => $sched)
                @if ($index % 2 == 0)
                    <div class="flex flex-col w-full items-center justify-center border border-[#F7FAF3] bg-[#F7FAF3] z-50 rounded-xl shadow-md"
                        data-aos="fade-left" data-aos-duration="3000">
                        <div class="flex max-xl:flex-col gap-6 justify-between p-4 rounded-xl w-full">
                            <div
                                class="w-[500px] h-[300px] max-xl:w-[330px] max-xl:h-[250px] max-lg:w-[250px] max-lg:h-[250px] mx-auto rounded-md flwx justify-center items-center">
                                <img src="{{ url(is_string($sched->thumbnail_link) ? $sched->thumbnail_link : '') }}"
                                    alt="" class="w-full h-full rounded-xl object-cover">
                            </div>

                            <div class="w-full flex flex-col justify-between py-4 gap-y-6  px-4">
                                <div class="flex flex-col gap-y-6 max-sm:gap-y-2">
                                    <p class="text-[#2F99C7] font-bold text-3xl max-xl:text-xl">{{ $sched->title }}</p>
                                    <div class="border-2 border-[#2F99C7] rounded-full "></div>
                                    <p class="text-[#75868B] text-[1rem]">{{ $sched->description }}</p>
                                </div>
                                <div class="flex justify-end max-xl:justify-center">
                                    <a href="{{ url('schedule/detail/' . $sched->id) }}" target="_blank"
                                        class="text-center bg-[#FF864E] text-white p-2 rounded-md text-[1rem] w-36 cursor-pointer hover:bg-[#B8D88F] shadow-md">
                                        อ่านเพิ่มเติม
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="flex flex-col w-full items-center justify-center border border-[#F7FAF3] bg-[#F7FAF3] z-50 rounded-xl relative shadow-md Z-50"
                        data-aos="fade-right" data-aos-duration="3000">
                        <div class="flex max-xl:flex-col gap-6 justify-between p-4 rounded-xl w-full">
                            <div
                                class="w-[500px] h-[300px] max-xl:w-[330px] max-xl:h-[250px] max-lg:w-[250px] max-lg:h-[250px] mx-auto rounded-md flwx justify-center items-center xl:order-2">
                                <img src="{{ url(is_string($sched->thumbnail_link) ? $sched->thumbnail_link : '') }}"
                                    alt="" class="w-full h-full rounded-xl object-cover">
                            </div>

                            <div class="w-full flex flex-col justify-between py-4 gap-y-6 px-4">
                                <div class="flex flex-col gap-y-6 max-sm:gap-y-2">
                                    <p class="text-[#2F99C7] font-bold text-3xl max-xl:text-xl">{{ $sched->title }}</p>
                                    <div class="border-2 border-[#2F99C7] rounded-full "></div>
                                    <p class="text-[#75868B] text-wrap text-[1rem]">{{ $sched->description }}</p>
                                </div>
                                <div class="flex justify-start max-xl:justify-center">
                                    <a href="{{ url('schedule/detail/' . $sched->id) }}" target="_blank"
                                        class="text-center bg-[#FF864E] text-white p-2 rounded-md text-[1rem] w-36 cursor-pointer hover:bg-[#B8D88F] shadow-md">
                                        อ่านเพิ่มเติม
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <img src="/images/home/Group 50.png" alt="" class="absolute top-4 left-0 w-40">
        <img src="/images/home/Group 22.png" alt="" class="absolute bottom-36  right-0 w-24">
        <img src="/images/home/Group 49.png" alt=""
            class="absolute  -bottom-40 right-[40rem] max-lg:right-[20rem] max-sm:right-[8rem] w-80">
    </section>

@endsection
@section('script')
@endsection
