@extends('frontend.layouts.layout-main')
@section('title', 'Seminar')
@section('style')
    {{-- <link rel="stylesheet" href="/css/aboutus.min.css"> --}}
@endsection
@section('content')

    <section
        class="mt-[4.5rem] max-xl:mt-[3rem] w-full h-[500px] max-xl:h-[350px] max-sm:h-[250px] relative z-50">
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
            data-aos="zoom-in" data-aos-duration="3000">First
            Conference and Exhibition on Health and
            Wellness Innovation
        </p>
        <p class="text-[#23404A] font-medium text-center text-2xl max-2xl:text-xl max-lg:text-lg max-sm:text-[1rem] z-40 max-md:px-2"
            data-aos="zoom-in" data-aos-duration="3000">“Empowering
            Invention to Innovation for Quality of
            Life” </p>
        <div class="flex flex-col w-[70%] max-md:w-full mx-auto my-12 items-center">

            <div class="flex max-xl:flex-col gap-6 justify-between items-center">
                <div class="rounded-2xl">
                    <div class="relative z-30 w-[600px] h-[400px] max-md:w-[500px] max-md:h-[350px] max-sm:w-[370px] max-sm:h-[350px] px-4 max-md:rouded-lg"
                        data-aos="fade-right" data-aos-duration="3000">
                        <div
                            class="bg-[#FFCAAE] drop-shadow-md w-full h-full rounded-2xl absolute -left-6 top-6 z-10 max-sm:hidden ">
                        </div>
                        <img src="/images/home/111.png" alt=""
                            class="w-full h-full relative z-20 rounded-2xl drop-shadow-md object-cover">
                    </div>
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
                        <p>ประเทศไทยมีศักยภาพในการเป็นผู้นำด้านสุขภาพ ด้วยทรัพยากร มนุษย์ แหล่งท่องเที่ยวธรรมชาติ
                            และองค์ความรู้ด้านการแพทย์แผนปัจจุบัน และ แผนไทย รวมถึงการผลิตสมุนไพร และผลิตภัณฑ์จากธรรมชาติ
                            อีกทั้งการวิจัย และพัฒนาเพื่อเสริมสร้างสุขภาพยังเป็นที่ยอมรับในระดับนานาชาติ</p>
                        <p>การประชุมในครั้งนี้มุ่งเน้นที่การพัฒนานวัตกรรมเพื่อสุขภาพ และความเป็นอยู่
                            ที่ดี โดยครอบคลุมหัวข้อที่สำคัญ ได้แก่ สุขภาพ สมรรถภาพทาง กายโภชนา
                            การ รูปลักษณ์ การนอนหลับ และการมีสติ โดยจะเน้นการ แสดงนวัตกรรม และ
                            การพัฒนาที่เกี่ยวข้องในด้านเหล่านี้อย่างครบวงจร
                        </p>
                    </div>

                </div>
            </div>

            <div class="mt-12  max-sm:px-4 flex flex-col gap-y-2 w-full" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                <p class="text-[#23404A] font-semibold text-2xl max-md:text-lg">หลักการและเหตุผล</p>

                <div class="flex flex-col gap-y-6 text-[1rem] indent-8">
                    <p> ในยุคที่โลกเผชิญกับการเปลี่ยนแปลงในหลายมิติ ทั้งสิ่งแวดล้อม สังคม และ
                        เทคโนโลยีความท้าทายด้านสุขภาพและการดำรงชีวิตคุณภาพ ได้เพิ่มขึ้น
                        การพัฒนานวัตกรรมและสิ่งประดิษฐ์ที่เกี่ยวข้องกับสุขภาพจึงมีความสำคัญ ทั้งในด้านการป้องกันและรักษา
                        รวมถึงอุตสาหกรรม ที่เกี่ยวข้อง เช่น อาหาร เครื่องดื่ม อุปกรณ์ทางการแพทย์ และการท่องเที่ยวเชิงสุขภาพ
                        ประเทศไทยมีศักยภาพในการเป็นผู้นำด้านสุขภาพ ด้วยทรัพยากรมนุษย์ แหล่งท่องเที่ยวธรรมชาติ
                        และองค์ความรู้ด้านการแพทย์แผนปัจจุบันและแผนไทย รวมถึงการผลิตสมุนไพรและผลิตภัณฑ์ จากธรรมชาติ
                        อีกทั้งการวิจัยและพัฒนาเพื่อเสริมสร้างสุขภาพยังเป็นที่ยอมรับในระดับนานาชาติ อย่างไรก็ตาม
                    </p>
                    <p> อุตสาหกรรมสุขภาพในปัจจุบันมีการแข่งขันสูงและเปลี่ยนแปลงอย่างรวดเร็ว การดูแลสุขภาพที่เคยเป็นแบบ "One
                        for All"
                        ได้พัฒนาไปสู่ "Personalized Care" ที่เน้นการดูแลแบบองค์รวม
                        การพัฒนานวัตกรรมด้านนี้จึงต้องสอดคล้องกับการเปลี่ยนแปลงดังกล่าว
                        เพื่อเพิ่มศักยภาพการแข่งขันและผลักดันประเทศไทยให้เป็นศูนย์กลางสุขภาพในเอเชียการบูรณาการระหว่างภาครัฐและเอกชนตลอดห่วงโซ่
                        ของอุตสาหกรรมสุขภาพจึงเป็นสิ่งสำคัญคณะทำงานจากเครือข่ายวิจัยและพัฒนาในหลายภาคส่วนจึงได้ร่วมมือกันจัดการประชุมและนิทรรศการ
                        ในครั้งนี้ขึ้นที่จังหวัดขอนแก่น
                    </p>
                </div>
            </div>
        </div>

        <img src="/images/home/Group 50.png" alt="" class="absolute top-4 left-0 w-40">
        <img src="/images/home/Group 22.png" alt="" class="absolute bottom-36 right-0 w-24">
        <img src="/images/home/Group 49.png" alt=""
            class="absolute  -bottom-40 right-[40rem] max-lg:right-[20rem] max-sm:right-[8rem] w-80">
    </section>

@endsection
@section('script')
@endsection