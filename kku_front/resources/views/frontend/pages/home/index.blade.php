@extends('frontend.layouts.layout-main')
@section('title', 'Home')
@section('style')
    {{-- @vite('resources/css/app.css') --}}
    @vite('resources/css/home.css')
@endsection

@section('content')
    @include('frontend.layouts.swiper')
    <div class="bg-white ">
        <section class="flex flex-col gap-4 relative pt-10 bg-white ">
            <p class="text-[#23404A] font-bold text-center text-3xl max-md:text-xl max-sm:text-lg z-40 max-md:px-2"
                data-aos="zoom-in" data-aos-duration="3000">First
                Conference and Exhibition on Health and
                Wellness Innovation
            </p>
            <p class="text-[#23404A] font-medium text-center text-2xl max-2xl:text-xl max-lg:text-lg max-sm:text-[1rem] z-40"
                data-aos="zoom-in" data-aos-duration="3000">“Empowering
                Invention to Innovation for Quality of
                Life” </p>

            <div class="relative z-40 flex max-xl:flex-col gap-6 justify-between w-[70%] max-md:w-full  mx-auto my-12 items-center"
                data-aos="zoom-in" data-aos-duration="3000">

                <div class="rounded-2xl">
                    <div
                        class="relative w-[600px] h-[400px] max-md:w-[500px] max-md:h-[350px] max-sm:w-[370px] max-sm:h-[350px] px-4 max-md:rouded-lg">
                        <div
                            class="bg-[#FFCAAE] drop-shadow-md w-full h-full rounded-2xl absolute -left-6 top-6 z-10 max-sm:hidden ">
                        </div>
                        <img src="/images/home/111.png" alt=""
                            class="w-full h-full relative z-20 rounded-2xl drop-shadow-md object-cover">
                    </div>
                </div>

                <div class="flex flex-col gap-y-6 justify-between max-xl:mt-6 px-4">
                    <div class="flex gap-6 items-center">
                        <div class="w-[50px] h-[50px]">
                            <img src="/images/home/meeting-call.png" alt="" class="w-full h-full">
                        </div>
                        <p class="text-[#4BCAFF] font-bold text-3xl max-md:text-lg">ที่มาของการสัมมนา</p>
                    </div>
                    <div class="flex flex-col gap-y-6 text-[1rem] indent-8">
                        <p>ประเทศไทยมีศักยภาพในการเป็นผู้นำด้านสุขภาพ ด้วยทรัพยากร มนุษย์ แหล่งท่องเที่ยวธรรมชาติ
                            และองค์ความรู้ด้านการแพทย์แผนปัจจุบัน และ แผนไทย รวมถึงการผลิตสมุนไพร และผลิตภัณฑ์จากธรรมชาติ
                            อีกทั้งการวิจัย และพัฒนาเพื่อเสริมสร้างสุขภาพยังเป็นที่ยอมรับในระดับนานาชาติ</p>
                        <p>การประชุมในครั้งนี้มุ่งเน้นที่การพัฒนานวัตกรรมเพื่อสุขภาพ และความเป็นอยู่
                            ที่ดี โดยครอบคลุมหัวข้อที่สำคัญ ได้แก่ สุขภาพ สมรรถภาพทาง กายโภชนา
                            การ รูปลักษณ์ การนอนหลับ และการมีสติ โดยจะเน้นการ แสดงนวัตกรรม และ
                            การพัฒนาที่เกี่ยวข้องในด้านเหล่านี้อย่างครบวงจร
                        </p>
                    </div>
                    <div class="flex justify-end">
                        <a href="/"
                            class="text-center bg-[#FF864E] text-white p-2 rounded-md text-[1rem] w-36 cursor-pointer hover:bg-[#f07a44] shadow-md">
                            อ่านเพิ่มเติม
                        </a>
                    </div>
                </div>
            </div>


            <img src="/images/home/Group 50.png" alt="" class="absolute -top-[14rem] left-0 z-10">
            <img src="/images/home/Group 22.png" alt="" class="absolute bottom-36 right-0 w-24">
            <img src="/images/home/Group 49.png" alt=""
                class="absolute  -bottom-[20rem] right-[40rem] max-lg:right-[20rem] max-sm:right-[8rem] w-80">
        </section>

        <section class="relative py-10 z-50 mt-15 ">
            <!-- รูปภาพทับพื้นหลัง -->

            <div class="absolute w-full h-full">
                <img src="/images/home/Group 438.png" alt="Your Image" class="w-full h-full">
            </div>


            <div
                class="bg-white w-[300px] max-sm:w-[250px]  py-4 px-4 rounded-r-2xl relative z-20 mt-14 max-sm:mt-20 shadow-md">
                <p class="text-[#23404A] font-bold text-end text-4xl max-md:text-2xl max-sm:text-[2rem]" data-aos="zoom-in"
                    data-aos-duration="3000">วิทยากร</p>
            </div>

            <div class="relative z-30 items-center mt-6">
                <div class="swiper items-center w-4/5 mx-auto">
                    <div class="swiper-wrapper w-full mx-auto flex">
                        @for ($i = 0; $i < 8; $i++)
                            <div data-aos="fade-up" data-aos-duration="1000" class="swiper-slide" data-aos="flip-left">
                                <div class="drop-shadow-md max-w-[350px] h-[100%] py-4">
                                    <div
                                        class="bg-white rounded-[15px] py-4 px-3 z-0 flex flex-col justify-center gap-y-4 ">
                                        <div
                                            class="w-[215px] h-[215px] mx-auto bg-gradient-to-r from-[#8DD7FA] to-[#B8D88F] rounded-full p-1">
                                            <img src="/images/home/111.png" alt=""
                                                class="w-full h-full object-cover rounded-full">
                                        </div>

                                        <div class="flex flex-col justify-center gap-y-4">
                                            <p class="text-[#23404A] font-bold text-center text-xl max-md:text-lg">Dr. khai
                                                khem </p>
                                            <p class="text-[#23404A] font-medium text-center text-lg max-md:text-md ">
                                                เคมีวิทยา</p>
                                            <p
                                                class="text-[#23404A] font-medium text-lg max-md:text-md text-start h-[150px] overflow-auto">
                                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Atque, officia
                                                ipsum dolor sit amet consectetur, adipisicing elit. Atque, officia
                                                adipisicing elit. Atque, officia
                                            </p>
                                        </div>

                                        <div class="flex justify-center mt-4">
                                            <p
                                                class="text-center bg-[#FF864E] text-white p-2 rounded-full text-[1rem] w-36 ">
                                                13 พ.ย. 2567</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>

        <section class="relative bg-white py-20 flex flex-col gap-4 Z-50">
            <p class="text-[#23404A] font-bold text-center text-4xl max-md:text-2xl max-sm:text-xl z-50 max-md:px-2"
                data-aos="zoom-in" data-aos-duration="3000">
                ลงทะเบียน
            </p>

            <div class="swiper mySwiper items-center w-4/5  max-ex:w-full mx-auto h-auto mt-4">
                <div class="swiper-wrapper w-full mx-auto flex">

                    @for ($i = 0; $i < 2; $i++)
                        <div class="swiper-slide" data-aos="fade-up" data-aos-duration="3000">
                            <div
                                class=" flex max-xl:flex-col gap-6 justify-between max-md:w-full  mx-auto items-center p-4 ">
                                <div
                                    class="drop-shadow-md border boder-2 flex flex-col gap-y-6 justify-between max-xl:mt-6 px-4 bg-white  rounded-2xl py-4 w-full max-xl:order-2 h-[450px] max-md:h-[350px] max-sm:h-[350px]">
                                    <div class="flex gap-6 items-center">
                                        <div class="w-[50px] h-[50px]">
                                            <img src="/images/home/formkit_people.png" alt="" class="w-full h-full">
                                        </div>
                                        <p class="text-[#84B750] font-bold text-2xl max-md:text-lg">ผู้เข้าร่วมอบรม</p>
                                    </div>
                                    <div class="flex flex-col gap-y-6 text-[1rem] indent-8 text-start overflow-y-auto">
                                        <p>ประเทศไทยมีศักยภาพในการเป็นผู้นำด้านสุขภาพ ด้วยทรัพยากร มนุษย์
                                            แหล่งท่องเที่ยวธรรมชาติ
                                            และองค์ความรู้ด้านการแพทย์แผนปัจจุบัน และ แผนไทย รวมถึงการผลิตสมุนไพร
                                            และผลิตภัณฑ์จากธรรมชาติ
                                            อีกทั้งการวิจัย และพัฒนาเพื่อเสริมสร้างสุขภาพยังเป็นที่ยอมรับในระดับนานาชาติ</p>
                                        <p>การประชุมในครั้งนี้มุ่งเน้นที่การพัฒนานวัตกรรมเพื่อสุขภาพ และความเป็นอยู่
                                            ที่ดี โดยครอบคลุมหัวข้อที่สำคัญ ได้แก่ สุขภาพ สมรรถภาพทาง กายโภชนา
                                            การ รูปลักษณ์ การนอนหลับ และการมีสติ โดยจะเน้นการ แสดงนวัตกรรม และ
                                            การพัฒนาที่เกี่ยวข้องในด้านเหล่านี้อย่างครบวงจร
                                        </p>
                                    </div>
                                    <div class="flex justify-strat">
                                        <a href="/"
                                            class="text-center bg-[#FF864E] text-white p-2 rounded-md text-[1rem] w-36 cursor-pointer hover:bg-[#f07a44] shadow-md">
                                            รายละเอียด
                                        </a>
                                    </div>
                                </div>

                                <div class="rounded-2xl drop-shadow-md w-full h-[450px] max-md:h-[350px] max-sm:h-[350px] max-md:rounded-lg"
                                    data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500"
                                    data-aos-duration="500">
                                    <img src="/images/home/111.png" alt=""
                                        class="w-full h-full relative z-20 rounded-2xl shadow-md object-cover">
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="swiper-pagination"></div>

        </section>

        <section class="relative bg-white flex flex-col gap-4 Z-50 py-8">
            <div class="absolute w-full h-full">
                <img src="images/home/Group 240.png" alt="Your Image" class="w-full h-full">
            </div>
            <p class="text-white font-bold text-center text-4xl max-md:text-2xl z-50 max-md:px-2 pt-10" data-aos="zoom-in"
                data-aos-duration="3000">
                ข่าวสาร
            </p>

            <div
                class="w-4/5 grid grid-cols-4 gap-4 max-yy:grid-cols-3 max-dm:grid-cols-2 max-ex:grid-cols-1 mx-auto py-10 max-ex:py-4 content-center place-items-center">
                @for ($i = 0; $i < 8; $i++)
                    <div class="drop-shadow-md max-w-[390px] max-es:w-[350px] flex justify-center h-[100%]">
                        <div class="bg-white rounded-[15px] z-0 flex flex-col justify-center gap-y-4 " data-aos="fade-up"
                            data-aos-duration="1500">
                            <div class="w-full h-[300px] mx-auto rounded-t-xl ">
                                <img src="/images/home/111.png" alt=""
                                    class="w-full h-full object-cover rounded-t-xl">
                            </div>

                            <div class="flex flex-col justify-center gap-y-4 px-3">
                                <p class="text-[#23404A] font-bold text-lg max-md:text-md text-start">
                                    การประชุมในครั้งนี้มุ่งเน้นที่การพัฒนานวัตกรรมเพื่อสุขภาพ</p>
                                <div class="flex items-center gap-2">
                                    <div class="max-w-[20px] h-[20px]">
                                        <img src="/images/home/Group 176.png" alt=""
                                            class="w-full h-full object-cover">
                                    </div>
                                    <p class="text-[#B9BBC7] text-md max-md:text-sm text-start">
                                        ข่าวสาร,ความรู้</p>
                                    <div class="max-w-[20px] h-[20px]">
                                        <img src="/images/home/Group 178.png" alt=""
                                            class="w-full h-full object-cover">
                                    </div>
                                    <p class="text-[#B9BBC7] text-md max-md:text-sm text-start">
                                        26/08/2567</p>

                                </div>

                                <p class="text-[#686868] text-lg max-md:text-md text-start h-[120px] overflow-auto">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Atque, officia
                                    ipsum dolor sit amet consectetur</p>
                            </div>

                            <div class="flex justify-end mt-4">
                                <p
                                    class="text-center font-medium text-[#FF864E] p-2 rounded-full text-[1rem] w-36 cursor-pointer hover:scale-105 transition duration-500">
                                    ดูเพิ่มเติม >></p>
                            </div>
                        </div>
                    </div>
                @endfor


            </div>
            <div class="relative flex justify-center mt-4 ">
                <p
                    class="text-center bg-[#FF864E] text-white p-2 rounded-md text-[1rem] w-36 cursor-pointer hover:bg-[#f07a44]">
                    ดูทั้งหมด</p>
            </div>

        </section>

        <section class="relative bg-white flex flex-col gap-4 Z-50 pb-8 ">

            <p class="text-[#23404A] font-bold text-center text-4xl max-md:text-2xl z-50 max-md:px-2 pt-10"
                data-aos="zoom-in" data-aos-duration="3000">
                ภาพกิจกรรม
            </p>

            <div
                class="relative  z-50 w-4/5 max-ex:w-full grid grid-cols-3 gap-4 gap-y-6 max-yy:grid-cols-3 max-dm:grid-cols-2 max-ex:grid-cols-1 mx-auto py-10 max-ex:py-4 content-center place-items-center">
                @for ($i = 0; $i < 6; $i++)
                    <div class="shadow-md shadow-[#C6E2F6] max-w-[390px] max-es:w-[350px] flex justify-center h-[100%] rounded-xl"
                        data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                        <div class="bg-white rounded-[15px] z-0 flex flex-col justify-center gap-y-4 ">
                            <div class="w-full h-[300px] mx-auto rounded-t-xl ">
                                <img src="/images/home/111.png" alt=""
                                    class="w-full h-full object-cover rounded-t-xl">
                            </div>
                            <div class="flex flex-col justify-center gap-y-4 px-3">
                                <p class="text-[#686868] text-lg max-md:text-md text-center h-[120px] overflow-auto">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Atque, officia
                                    ipsum dolor sit amet consectetur
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="relative flex justify-center mt-4 z-50">
                <p
                    class="text-center bg-[#FF864E] text-white p-2 rounded-md text-[1rem] w-36 cursor-pointer hover:bg-[#f07a44] shadow-md">
                    ดูทั้งหมด</p>
            </div>

            <img src="/images/home/Group 50.png" alt=""
                class="absolute top-[6rem] left-0 w-[200px] max-2xl:w-[150px] max-lg:w-[100px] max-md:hidden">
            <img src="/images/home/Group 22.png" alt=""
                class="absolute bottom-36 right-0 w-[200px]  max-2xl:w-[150px] max-lg:w-[100px] max-md:hidden">
            <img src="/images/home/Group 49.png" alt=""
                class="absolute  -bottom-[20rem] max-md:bottom-0 left-[20rem] max-lg:right-[20rem] max-sm:right-[8rem] w-[600px] max-2xl:w-[450px] max-lg:w-[300px] max-md:hidden">

        </section>

        <section class="relative bg-[#F4FCFF] flex flex-col gap-4 Z-50 pb-4">
            <p class="text-[#23404A] font-bold text-center text-4xl max-md:text-2xl z-50 max-md:px-2 pt-16 max-sm:pt-8"
                data-aos="zoom-in" data-aos-duration="3000">
                ที่พัก เส้นทาง และผังจัดงาน
            </p>
            <div class="mt-4 shadow-md w-full h-[450px] max-md:h-[300px] max-sm:h-[200px]">
                <iframe class="w-full h-full"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3826.022264172706!2d102.8194493751446!3d16.47441028426533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31228a8eb01c96f3%3A0xf6a47b89e419df87!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4LiC4Lit4LiZ4LmB4LiB4LmI4LiZ!5e0!3m2!1sth!2sth!4v1726040464805!5m2!1sth!2sth"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>

        <section class=" py-10 mt-15 bg-white items-center">
            <p class="text-[#23404A] font-bold text-center text-4xl max-md:text-2xl max-md:px-2" data-aos="zoom-in"
                data-aos-duration="3000">
                ผู้สนับสนุน
            </p>
            <div class="relative z-30 items-center mt-8">
                <div class="swiper swiper1 items-center w-11/12 mx-auto">
                    <div class="swiper-wrapper w-full mx-auto flex">
                        @for ($i = 0; $i < 10; $i++)
                            <div class="swiper-slide flex flex-col justify-center">
                                <div class="flex justify-center">
                                    <div class="w-[200px] h-[120px] flex justify-center" data-aos="zoom-in"
                                        data-aos-duration="3000">
                                        <img src="/images/home/Mask group (2).png" alt="" class="w-full h-full">
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>

                </div>
                <div class="swiper-button-next swiper-button-next1"></div>
                <div class="swiper-button-prev swiper-button-prev1"></div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    @vite('resources/js/home/swiper.js')
@endsection