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


    <section class="flex flex-col gap-4 relative  pt-10 bg-white ">
        <div
            class="relative  z-50 w-4/5 max-ex:w-full grid grid-cols-3 gap-4 gap-y-6 max-yy:grid-cols-3 max-dm:grid-cols-2 max-ex:grid-cols-1 mx-auto py-10 max-ex:py-4 content-center place-items-center" data-aos="zoom-in"  data-aos-duration="2000">
            @for ($i = 0; $i < 12; $i++)
                <a href="{{ route('activity.detail') }}"  target="_blank" class="shadow-md  shadow-[#C6E2F6] max-w-[390px] max-es:w-[350px] flex justify-center h-[100%] rounded-xl hover:scale-95">
                    <div class="bg-white rounded-[15px] z-0 flex flex-col justify-center gap-y-4 " >
                        <div class="w-full h-[300px] mx-auto rounded-t-xl ">
                            <img src="/images/home/111.png" alt="" class="w-full h-full object-cover rounded-t-xl">
                        </div>
                        <div class="flex flex-col justify-center gap-y-4 px-3 " >
                            <p class="text-[#686868] text-lg max-md:text-md text-center h-[120px] overflow-auto">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Atque, officia
                                ipsum dolor sit amet consectetur
                        </div>
                    </div>
                </a>
            @endfor
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
