@extends('frontend.layouts.layout-main')
@section('title', 'Schedule')
@section('style')
    {{-- <link rel="stylesheet" href="/css/aboutus.min.css"> --}}
@endsection
@section('content')

    <section class="mt-[4.5rem] max-xl:mt-[3rem] w-full h-[500px] max-xl:h-[350px] max-sm:h-[250px] relative z-50">
        <div class="absolute inset-0 z-50 flex flex-col justify-center items-center gap-y-4 max-sm:gap-y-2 px-4">
            <p class="text-white text-6xl max-xl:text-3xl max-md:text-2xl  font-bold text-center" data-aos="zoom-in"
                data-aos-duration="3000">
                ตารางการสัมมนา
            </p>
        </div>

        <img src="/images/banner/image121.png" alt="" class="w-full h-full absolute object-cover">
    </section>


    <section class="w-4/5 flex flex-col gap-4 relative  py-10 bg-white mx-auto">
        <p class="text-[#23404A] font-bold text-center text-3xl max-md:text-xl z-40 max-md:px-2" data-aos="zoom-in"
            data-aos-duration="3000">ตารางกำหนดการสัมมนา
        </p>
        <p class="text-[#23404A] text-center text-xl max-lg:text-lg max-sm:text-[1rem] z-40 max-md:px-2" data-aos="zoom-in"
            data-aos-duration="3000">Lorem ipsum dolor sit amet consectetur. Blandit sed tincidunt sit
            purus lacus consectetur nulla montes.</p>

        <div class="my-12 flex flex-col gap-6 ">
            <p class="text-[#FF864E] font-bold text-center text-3xl max-md:text-xl z-40 max-md:px-2" data-aos="zoom-in"
            data-aos-duration="3000">วันที่ 14 พฤษาจิกายน 2567</p>
            <div class="border-[1px] border-[#FF864E] rounded-full"></div>
            <p class="text-[#23404A] text-center text-xl max-lg:text-lg max-sm:text-[1rem] z-40 max-md:px-2" data-aos="zoom-in"
            data-aos-duration="3000">การประชุมและนิทรรศการครั้งที่ 1 เกี่ยวกับนวัตกรรมเพื่อสุขภาพและความเป็นอยู่ที่ดี : เสริมพลังการประดิษฐ์สู่นวัตกรรม เพื่อคุณภาพชีวิต</p>
        </div>

        <div class="max-w-[1200px] mx-auto">
            <img src="/images/banner/image121.png" alt="">
        </div>

    </section>

@endsection
@section('script')
@endsection
