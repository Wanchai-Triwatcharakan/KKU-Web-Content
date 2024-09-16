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


    <section class="flex flex-col gap-4 relative  pt-10 bg-white ">
        <p class="text-[#23404A] font-bold text-center text-3xl max-md:text-xl z-40 max-md:px-2" data-aos="zoom-in"
            data-aos-duration="3000">ตารางกำหนดการสัมมนา
        </p>
        <p class="text-[#23404A] text-center text-xl max-lg:text-lg max-sm:text-[1rem] z-40 max-md:px-2" data-aos="zoom-in"
            data-aos-duration="3000">Lorem ipsum dolor sit amet consectetur. Blandit sed tincidunt sit
            purus lacus consectetur nulla montes.</p>

        <div class="my-12 z-50 flex flex-col gap-6 max-xl:grid max-2xl:grid-cols-2 max-md:grid-cols-1  max-xl:gap-2">
            @for ($i = 0; $i < 2; $i++)
                <div class="max-sm:mx-4 flex flex-col max-w-[90%] max-xl:w-full max-md:w-full mx-auto border border-[#F7FAF3] bg-[#F7FAF3]  items-center z-50 rounded-xl shadow-md"
                    data-aos="fade-left" data-aos-duration="3000">
                    <div class="flex max-xl:flex-col gap-6 justify-between p-4 rounded-xl ">
                        <div
                            class="w-[450px] h-[300px] max-xl:w-[350px] max-xl:h-[250px] max-lg:w-[250px] max-lg:h-[250px] mx-auto rounded-md flwx justify-center items-center">
                            <img src="/images/home/111.png" alt="" class="w-full h-full rounded-xl">
                        </div>

                        <div class="w-full flex flex-col justify-between py-4 gap-y-6 px-4">
                            <div class="flex flex-col gap-y-6">
                                <p class="text-[#2F99C7] font-bold text-3xl max-xl:text-xl">วันที่ 13 พฤษาจิกายน 2567</p>
                                <div class="border-2 border-[#2F99C7] rounded-full "></div>
                                <p class="text-[#75868B] text-xl max-md:text-lg">Training Workshop
                                    “การสร้างนวัตกรรมและเส้นทางสู่
                                    Medical Device & Wellness Tech Business” (จัดร่วมกับ NIA)</p>
                            </div>
                            <div class="flex justify-end max-xl:justify-center">
                                <a href="{{ route('schedule.detail') }}"
                                    class="text-center bg-[#FF864E] text-white p-2 rounded-md text-[1rem] w-36 cursor-pointer hover:bg-[#f07a44] shadow-md">
                                    อ่านเพิ่มเติม
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="max-sm:mx-4 flex flex-col max-w-4/5 max-xl:w-full max-md:w-full mx-auto border border-[#F7FAF3] bg-[#F7FAF3]  items-center z-50 rounded-xl shadow-md"
                data-aos="fade-right" data-aos-duration="3000">
                <div class="flex max-xl:flex-col gap-6 justify-between p-4 rounded-xl ">
                    <div
                        class="w-[450px] h-[300px] max-xl:w-[350px] max-xl:h-[250px] max-lg:w-[250px] max-lg:h-[250px] mx-auto rounded-md flwx justify-center items-center xl:order-2">
                        <img src="/images/home/111.png" alt="" class="w-full h-full rounded-xl">
                    </div>
                    <div class="w-full flex flex-col justify-between py-4 gap-y-6 px-4">
                        <div class="flex flex-col gap-y-6">
                            <p class="text-[#2F99C7] font-bold text-3xl max-xl:text-xl">วันที่ 13 พฤษาจิกายน 2567</p>
                            <div class="border-2 border-[#2F99C7] rounded-full "></div>
                            <p class="text-[#75868B] text-xl max-md:text-lg">Training Workshop
                                “การสร้างนวัตกรรมและเส้นทางสู่
                                Medical Device & Wellness Tech Business” (จัดร่วมกับ NIA)</p>
                        </div>
                        <div class="flex justify-end max-xl:justify-center">
                            <a href="{{ route('schedule.detail') }}"
                                class="text-center bg-[#FF864E] text-white p-2 rounded-md text-[1rem] w-36 cursor-pointer hover:bg-[#f07a44] shadow-md">
                                อ่านเพิ่มเติม
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            @endfor
        </div>

        <img src="/images/home/Group 50.png" alt="" class="absolute top-4 left-0 w-40">
        <img src="/images/home/Group 22.png" alt="" class="absolute bottom-36 right-0 w-24">
        <img src="/images/home/Group 49.png" alt=""
            class="absolute  -bottom-40 right-[40rem] max-lg:right-[20rem] max-sm:right-[8rem] w-80">
    </section>

@endsection
@section('script')
@endsection
