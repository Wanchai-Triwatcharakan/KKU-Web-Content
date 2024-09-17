@extends('frontend.layouts.layout-main')
@section('title', 'Schedule')
@section('style')
    {{-- <link rel="stylesheet" href="/css/aboutus.min.css"> --}}
@endsection
@section('content')

    {{-- banner --}}
    <section class="mt-[4.5rem] max-xl:mt-[3rem] w-full h-[500px] max-xl:h-[350px] max-sm:h-[250px] relative z-50">
        <div class="absolute inset-0 z-50 flex flex-col justify-center items-center gap-y-4 max-sm:gap-y-2 px-4">
            <p class="text-white text-6xl max-xl:text-3xl max-md:text-2xl  font-bold text-center" data-aos="zoom-in"
                data-aos-duration="3000">
                ตารางการสัมมนา
            </p>
        </div>

        <img src="/images/banner/image121.png" alt="" class="w-full h-full absolute object-cover">
    </section>
    {{-- banner --}}


    <section class="w-4/5 flex flex-col gap-4 relative  py-10 bg-white mx-auto">
        <p class="text-[#23404A] font-bold text-center text-3xl max-md:text-xl z-40 max-md:px-2" data-aos="zoom-in"
            data-aos-duration="2000">ตารางกำหนดการสัมมนา
        </p>
        <p class="text-[#23404A] text-center text-xl max-lg:text-lg max-sm:text-[1rem] z-40 max-md:px-2" data-aos="zoom-in"
            data-aos-duration="3000">Lorem ipsum dolor sit amet consectetur. Blandit sed tincidunt sit
            purus lacus consectetur nulla montes.</p>

        <div class="my-12 flex flex-col gap-6 ">
            <p class="text-[#FF864E] font-bold text-center text-3xl max-md:text-xl z-40 max-md:px-2" data-aos="zoom-in"
                data-aos-duration="2000">วันที่ 14 พฤษาจิกายน 2567</p>
            <div class="border-[1px] border-[#FF864E] rounded-full"></div>
            <p class="text-[#23404A] text-center text-xl max-lg:text-lg max-sm:text-[1rem] z-40 max-md:px-2"
                data-aos="zoom-in" data-aos-duration="3000">การประชุมและนิทรรศการครั้งที่ 1
                เกี่ยวกับนวัตกรรมเพื่อสุขภาพและความเป็นอยู่ที่ดี : เสริมพลังการประดิษฐ์สู่นวัตกรรม เพื่อคุณภาพชีวิต</p>
        </div>

        <div class="max-w-[1200px] h-[400px] max-xl:h-[300px] max-xl:w-full max-sm:h-[250px] mx-auto shadow-md"
            data-aos="zoom-in-up" data-aos-duration="3000">
            <img src="/images/banner/image121.png" alt="" class="w-full h-full">
        </div>
    </section>

    <section class="w-4/5 mx-auto pb-10 bg-white" data-aos="fade-up" data-aos-duration="3000">
        <p class="bg-[#FF864E] pl-[5rem] max-lg:pl-[1rem] py-4 text-white text-xl font-medium rounded-t-lg">ตารางสัมมนา</p>

        @for ($i = 0; $i < 6; $i++)
            <div
                class="pl-[5rem] max-lg:pl-[1rem] flex py-4 gap-4 justify-start max-sm:flex-col text-lg max-lg:text-[1rem]  text-[#23404A]">
                <p class="font-medium w-[20%] max-lg:w-[50%]">08:30 - 08:45 น.</p>
                <p class="">Forum I: Perspective View: Trends& Driving Role of Innovation in Health &
                    Wellness Industry (รมต /ผู้แทน ที่เกี่ยวข้องใน supply chain) <br>Moderator : ศ.ดร.ศุภชัย ปทุมนากุล
                    รองปลัดกระทรวงอุดมศึกษา วิทยาศาสตร์ วิจัยและนวัตกรรม (อว.)
                </p>
            </div>
            <hr>
        @endfor
    </section>


    <section class="w-4/5 mx-auto bg-white" data-aos="fade-up" data-aos-duration="3000">
        <p class="text-xl font-medium text-[#23404A]">กรุณาเลือกห้องเพื่อเเสดงกำหนดการ</p>
        <div class="flex py-4 gap-6 justify-start max-xl:flex-col">
            <div class="flex flex-col  gap-4 gap-y-4 max-xl:flex-row  max-xl:justify-between items-center max-sm:grid max-sm:grid-cols-2 place-items-center">
                @for ($i = 1; $i < 6; $i++)
                    <button
                        class="room-btn w-[150px] max-sm:w-[140px] bg-[#BCEB77] hover:bg-[#caf589] hover:text-black hover:scale-110 text-[#32421E] font-bold py-3 px-4 border-r-4 border-b-4 border-[#84B750] rounded-lg text-lg cursor-pointer {{ $i == 1 ? 'active' : '' }}"
                        data-room="{{ $i }}">
                        ห้อง {{ $i }}
                    </button>
                @endfor
            </div>
    
            {{-- ข้อมูล --}}
            @for ($i = 1; $i < 6; $i++)
                <div class="room-data flex flex-col bg-[#F7FAF3] rounded-lg p-6 w-full {{ $i == 1 ? '' : 'hidden' }}" data-room="{{ $i }}">
                    <p class="text-xl font-medium text-[#23404A] mb-4">ห้องที่ {{ $i }} Update Knowledge and
                        Innovation Trends in</p>
                    @for ($j = 0; $j < 6; $j++)
                        <div class="flex py-4 gap-4 justify-start text-lg max-lg:text-[1rem] text-[#23404A] max-sm:flex-col">
                            <p class="font-medium w-[20%] max-lg:w-[50%]">08:30 - 08:45 น.</p>
                            <p>Forum I: Perspective View: Trends & Driving Role of Innovation in Health & Wellness Industry 
                                (รมต /ผู้แทน ที่เกี่ยวข้องใน supply chain) <br>Moderator : ศ.ดร.ศุภชัย ปทุมนากุล รองปลัดกระทรวงอุดมศึกษา 
                                วิทยาศาสตร์ วิจัยและนวัตกรรม (อว.)
                            </p>
                        </div>
                        <hr>
                    @endfor
                </div>
            @endfor
        </div>
    </section>

@endsection
@section('script')
@vite('resources/js/schedule/schedule.js')
@endsection
