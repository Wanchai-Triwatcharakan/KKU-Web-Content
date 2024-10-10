@extends('frontend.layouts.layout-main')
@section('title', 'Activity')
@section('style')
    {{-- <link rel="stylesheet" href="/css/aboutus.min.css"> --}}
@endsection
@section('content')
    <section class="mt-[4.5rem] max-xl:mt-[3rem] w-full h-[500px] max-xl:h-[350px] max-sm:h-[250px] relative z-50">
        <div class="absolute inset-0 z-50 flex flex-col justify-center items-center  gap-y-4 max-sm:gap-y-2  ">
            <p class="text-white text-6xl max-xl:text-3xl max-md:text-2xl w-full py-6 bg-[#B8D88F] opacity-15 font-bold text-center"
                data-aos="zoom-in" data-aos-duration="3000">
                ภาพกิจกรรม
            </p>
        </div>

        <img src="/images/banner/image121.png" alt="" class="w-full h-full absolute object-cover">
    </section>

    @php
        $justify = 'flex justify-center ';
        if (count($photoactivity) > 2) {
            $justify =
                'grid grid-cols-3 gap-4 gap-y-6 max-yy:grid-cols-3 max-dm:grid-cols-2 max-ex:grid-cols-1 place-items-center';
        }
    @endphp
    <section class="flex flex-col gap-4 relative pt-20 max-sm:pt-20 bg-white ">
        <div class="relative  z-50 w-4/5 max-ex:w-full  mx-auto py-10 max-ex:py-4 content-center {{$justify}}"
            data-aos="zoom-in" data-aos-duration="2000">
            @foreach ($photoactivity as $photo)
            <a href="{{ url('activity/detail/' . $photo->id) }}" target="_blank"
                class="shadow-md  shadow-[#C6E2F6] max-w-[390px] max-es:w-[350px] flex justify-center h-[100%] rounded-xl hover:scale-95"
                data-aos="fade-up" data-aos-duration="1500">
                <div class="bg-white rounded-[15px] z-0 flex flex-col justify-center gap-y-4 ">
                    <div class="w-full h-[300px] mx-auto rounded-t-xl relative">
                        <img src="{{ url($photo->thumbnail_link) }}" alt=""
                            class="w-full h-full object-cover rounded-t-xl">
                            <div class="absolute inset-0 rounded-t-xl bg-gradient-to-b from-[#ffffff] to-[#84B750] opacity-0 hover:opacity-50 flex justify-center items-center transition-opacity duration-300"></div>
                    </div>


                    <div class="flex flex-col justify-center gap-y-4 px-3 ">
                        <p class="text-[#686868] text-lg max-md:text-md text-center h-[120px] overflow-auto">
                            {{ $photo->title }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="flex justify-center items-center gap-2 mb-12 z-50 ">
            <a href=""
                class="bg-white flex justify-center items-center border border-[#84B750] w-10 h-10 rounded-md text-xl font-bold hover:bg-[#84B750] hover:text-white"
                data-aos="zoom-in" data-aos-duration="2000">
                < </a>
                    <span
                        class="bg-white flex justify-center items-center border border-[#84B750] w-10 h-10 rounded-md text-lg font-semibold cursor-pointer hover:bg-[#84B750] hover:text-white"
                        data-aos="zoom-in" data-aos-duration="2000">1</span>
                    <span
                        class="bg-white flex justify-center items-center border border-[#84B750] w-10 h-10 rounded-md text-lg font-semibold cursor-pointer hover:bg-[#84B750] hover:text-white"
                        data-aos="zoom-in" data-aos-duration="2000">2</span>
                    <span
                        class="bg-white flex justify-center items-center border border-[#84B750] w-10 h-10 rounded-md text-lg font-semibold cursor-pointer hover:bg-[#84B750] hover:text-white"
                        data-aos="zoom-in" data-aos-duration="2000">3</span>
                    <a href=""
                        class="bg-white flex justify-center items-center border border-[#84B750] w-10 h-10 rounded-md text-xl font-bold hover:bg-[#84B750] hover:text-white"
                        data-aos="zoom-in" data-aos-duration="3000">></a>
        </div>

        <img src="/images/home/Group 50.png" alt="" class="absolute top-4 left-0 w-40">
        <img src="/images/home/Group 22.png" alt="" class="absolute bottom-36 right-0 w-24">
        <img src="/images/home/Group 49.png" alt=""
            class="absolute  -bottom-40 right-[40rem] max-lg:right-[20rem] max-sm:right-[8rem] w-80">
    </section>

@endsection
@section('script')
@endsection
