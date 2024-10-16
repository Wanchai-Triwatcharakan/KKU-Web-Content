@extends('frontend.layouts.layout-main')
@section('title', 'Register')
@section('style')
    {{-- <link rel="stylesheet" href="/css/aboutus.min.css"> --}}
@endsection
@section('content')

    <section class="mt-[4.5rem] max-xl:mt-[3rem] w-full h-[500px] max-xl:h-[350px] max-sm:h-[250px] relative z-50">
        <div class="absolute inset-0 z-50 flex flex-col justify-center items-center gap-y-4 max-sm:gap-y-2 px-4">
            <p class="text-white text-6xl max-xl:text-3xl  font-bold text-center" data-aos="zoom-in" data-aos-duration="3000">
                การลงทะเบียน
            </p>
        </div>

        <img src="/images/banner/image1.png" alt="" class="w-full h-full absolute object-cover">
    </section>

    <section class="flex flex-col justify-center gap-4 py-10  bg-white relative">

        <div class="w-[60%] mx-auto flex flex-col justify-center gap-12 mt-20 max-sm:mt-12 items-center">
            <img src="/images/home/Group 439.png" alt="" class="w-full h-full top-0 absolute z-10 object-cover">
            @foreach ($regisPost as $post)
                <a href="{{ url('register/detail/'.$post->id) }}" target="_blank"
                    class=" z-50 flex justify-between bg-[#F7FAF3] hover:bg-[#84B750] group hover:shadow-[#84B750] rounded-2xl shadow-md max-sm:flex-col " data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom" data-aos-duration="3000">
                    <div class="flex flex-col gap-4 p-6 items-start justify-center w-[70%] max-sm:w-full max-sm:order-2">
                        <p class="text-[#23404A] group-hover:text-white font-bold text-start text-2xl max-md:text-xl ">{{$post->title}}</p>
                        <p class="text-[#686868] group-hover:text-white text-start text-xl max-lg:text-lg max-sm:text-[1rem]">{{$post->keyword}}</p>
                    </div>
                    <div class="rounded-2xl w-[550px] h-[300px] max-sm:w-[350px] max-sm:h-[250px] shadow-md">
                        <img src="{{ url($post->thumbnail_link) }}" alt=""
                            class="w-full h-full rounded-2xl object-cover shadow-md">
                    </div>
                </a>
            @endforeach
        </div>

    </section>
    
    <section class="relative bg-[#F4FCFF] flex flex-col gap-4 Z-50 pb-4">
        <p class="text-[#23404A] font-bold text-center text-4xl max-md:text-2xl z-50 max-md:px-2 pt-16 max-sm:pt-8"
            data-aos="zoom-in" data-aos-duration="3000">{{ $location->title }}</p>
        <div class="mt-4 shadow-md w-full h-[450px] max-md:h-[300px] max-sm:h-[200px]">
            {!! $location->iframe !!}
        </div>
    </section>

@endsection
@section('script')
@endsection
