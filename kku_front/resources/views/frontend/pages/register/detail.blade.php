@extends('frontend.layouts.layout-main')
@section('title', 'Details')
@section('style')
    {{-- <link rel="stylesheet" href="/css/aboutus.min.css"> --}}
@endsection
@section('content')

    <section
        class="mt-[4.5rem] max-xl:mt-[3rem]  h-[250px] w-full  relative z-50 bg-[#8DD7FA] shadow-sm">
        <div
            class="absolute w-[60%] max-2xl:w-[80%] h-[350px] max-xl:h-[300px] max-sm:h-[250px]  mx-auto bg-white inset-0 top-12 z-50 flex flex-col justify-center  gap-y-4 max-sm:gap-y-2 border rounded-xl shadow-md">
            <div class="w-[60%] max-sm:w-full flex flex-col gap-6 px-8 items-start justify-center  z-20">
                <p class="text-[#84B750] font-semibold text-start text-6xl max-xl:text-3xl ">ผู้ฟังทั่วไป
                </p>
                <p class="text-[#686868] text-start text-2xl max-2xl:text-xl max-lg:text-lg max-sm:text-[1rem]">
                    ผู้เข้าร่วมในรูปแบบนี้สามารถเข้าฟังการบรรยายหลัก
                    ในงานประชุมวิชาการได้โดยไม่มีค่าใช้จ่าย</p>
            </div>
            <div class="flex justify-end w-[50%] h-full max-sm:w-full right-0  absolute z-10 items-end max-sm:opacity-30">
                <img src="/images/home/111.png" alt="" class="w-full h-full rounded-r-xl object-cover shadow-md"
                    style="mask-image: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 100%);
                           -webkit-mask-image: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 100%);">
            </div>
        </div>
    </section>



    <section class="flex flex-col justify-center gap-4 py-10 bg-white mt-[12rem] mb-12 max-xl:mt-[8rem] max-sm:mt-[5rem]">
        <div class="w-[70%] mx-auto flex flex-col justify-center gap-12  items-center">
            <div class="flex max-xl:flex-col gap-y-8 justify-between items-center">
                <div class="w-full flex flex-col gap-y-6 justify-between max-xl:mt-6 px-4 max-xl:order-2" data-aos="fade-right"
                    data-aos-duration="3000">
                    <div class="flex gap-6 items-center">
                        <p class="text-[#23404A] font-semibold text-3xl max-md:text-lg">รายละเอียด</p>
                    </div>
                    <ui class="text-[#23404A] flex flex-col gap-y-6 text-[1rem] ">
                        <li>ประเทศไทยมีศักยภาพในการเป็นผู้นำด้านสุขภาพ ด้วยทรัพยากร มนุษย์ แหล่งท่องเที่ยวธรรมชาติ
                            และองค์ความรู้ด้านการแพทย์แผนปัจจุบัน และ แผนไทย รวมถึงการผลิตสมุนไพร และผลิตภัณฑ์จากธรรมชาติ
                            อีกทั้งการวิจัย และพัฒนาเพื่อเสริมสร้างสุขภาพยังเป็นที่ยอมรับในระดับนานาชาติ</li>
                        <li>การประชุมในครั้งนี้มุ่งเน้นที่การพัฒนานวัตกรรมเพื่อสุขภาพ และความเป็นอยู่
                            ที่ดี โดยครอบคลุมหัวข้อที่สำคัญ ได้แก่ สุขภาพ สมรรถภาพทาง กายโภชนา
                            การ รูปลักษณ์ การนอนหลับ และการมีสติ โดยจะเน้นการ แสดงนวัตกรรม และ
                            การพัฒนาที่เกี่ยวข้องในด้านเหล่านี้อย่างครบวงจร
                        </li>
                    </ui>
                    <div class="flex justify-start gap-4">
                        <div class="w-6 h-6">
                            <img src="/images/home/Group 435.png" alt="" class="w-full h-full">
                        </div>
                        <div class="flex max-xs:flex-col gap-2">
                        <p class="text-[#23404A] text-[1rem]">สนใจสมัครได้ที่ :</p>
                        <a href="https://www.Test_HHPandHP.co.th" target="_blank" rel="noopener noreferrer" class="text-[#23404A] text-[1rem]">www.Test_HHPandHP.co.th</a></div>
                    </div>
                </div>

                <div class="rounded-2xl max-2xl:order-1">
                    <div class="relative z-30 w-[600px] h-[400px] max-md:w-[500px] max-md:h-[350px] max-sm:w-[370px] max-sm:h-[350px] px-4 max-md:rouded-lg"
                        data-aos="fade-left" data-aos-duration="3000">
                        <div
                            class="bg-[#B8D88F] drop-shadow-md w-[550px] h-full rounded-2xl absolute  top-8 -right-4 z-10 max-sm:hidden ">
                        </div>
                        <img src="/images/home/111.png" alt=""
                            class="w-full h-full relative z-20 rounded-2xl drop-shadow-md object-cover">
                    </div>
                </div>
            </div>
        </div>


    </section>

@endsection
@section('script')
@endsection
