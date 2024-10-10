@extends('frontend.layouts.layout-main')
@section('title', 'Contact')
@section('style')
    {{-- <link rel="stylesheet" href="/css/aboutus.min.css"> --}}
@endsection
@section('content')

    <section class="mt-[4.5rem] max-xl:mt-[3rem] w-full h-[500px] max-xl:h-[350px] max-sm:h-[250px] relative z-50">
        <div class="absolute inset-0 z-50 flex flex-col justify-center items-center gap-y-4 max-sm:gap-y-2 px-4">
            <p class="text-white text-6xl max-xl:text-3xl  font-bold text-center" data-aos="zoom-in" data-aos-duration="3000">
                ติดต่อเรา
            </p>
        </div>

        <img src="/images/banner/image122.png" alt="" class="w-full h-full absolute object-cover ">
    </section>

    <section class="w-4/5 max-sm:w-[90%] mx-auto pt-20 max-sm:pt-12">
        <div class="flex justify-between max-sm:flex-col py-10 gap-8">
            <div class="flex flex-col gap-6 justify-between w-full">
                <div class="flex flex-col gap-6 max-sm:items-center ">
                    <p class="text-[#FF864E] font-medium text-lg">ติดต่อเรา</p>
                    <p class="text-[#23404A] font-bold text-3xl">ติดต่อสอบถาม</p>
                    <p class="text-[#75868B] text-lg max-sm:indent-10">หากท่านต้องการติดต่อ หรือสอบถามเรื่องงานสัมมนา
                        สามารถกรอกข้อมูลเพือให้ทางเจ้าหน้าที่ติดต่อกลับ</p>
                </div>
                <div class="flex gap-4 max-sm:justify-center">
                    <a href="" class="bg-white rounded-full p-2 w-12 h-12 border hover:bg-[#84B750] shadow-md group">
                        <img src="/images/icon/facebook.png" alt=""
                            class="w-full h-full group-hover:filter group-hover:invert group-hover:saturate-12 group-hover:hue-rotate-237 group-hover:brightness-0 group-hover:contrast-30">
                    </a>
                    <a href="" class="bg-white rounded-full p-2 w-12 h-12 border hover:bg-[#84B750] shadow-md group">
                        <img src="/images/icon/jam_line.png" alt=""
                            class="w-full h-full group-hover:filter group-hover:invert group-hover:saturate-12 group-hover:hue-rotate-237 group-hover:brightness-0 group-hover:contrast-30">
                    </a>
                    <a href="mailto:example@email.com" class="bg-white rounded-full p-2 w-12 h-12 border hover:bg-[#84B750] shadow-md group">
                        <img src="/images/icon/mail.png" alt=""
                            class="w-full h-full group-hover:filter group-hover:invert group-hover:saturate-12 group-hover:hue-rotate-237 group-hover:brightness-0 group-hover:contrast-30">
                    </a>
                </div>
            </div>
            <form action="{{ route('contact.newletter') }}" method="POST" class="bg-[#F5F7FA] p-6 border rounded-lg flex flex-col gap-6 w-full">
                @csrf
                <div class="flex justify-between gap-4">
                    <input type="text" id="name" name="name" class="p-3 rounded-lg w-full outline-none border text-[#23404A]"
                        placeholder="Your Name" required>
                    <input type="tel" id="tel" name="tel" class="p-3 rounded-lg w-full outline-none border text-[#23404A]"
                        placeholder="Phone" maxlength="10" required>
                </div>
                <input type="email" id="email" name="email" class="p-3 rounded-lg outline-none border text-[#23404A]" placeholder="E-mail" required>
                <textarea name="message" id="" cols="10" rows="5"
                    class="p-3 rounded-lg outline-none border text-[#23404A]" placeholder="Write Your Message"></textarea>

                <div class="flex justify-start max-sm:justify-center">
                    <button class="bg-[#FF864E] rounded-lg text-white text-lg px-4 py-2 hover:bg-[#A7CA78]" type="submit">
                        Send Your Message
                    </button>
                </div>
                @if (session('message'))
                    <p class="text-green-500">{{ session('message') }}</p>
                @endif
            </form>
        </div>

        <div
            class="bg-[#A7CA78] shadow-md p-12 max-sm:p-6 rounded-t-3xl  flex justify-between  items-center  gap-4 text-white text-xl max-2xl:text-lg max-lg:flex-col max-lg:items-start">
            <a href="tel:043-320-320" target="_blank" class="flex  gap-4 items-center group">
                <div
                    class="bg-white rounded-full p-2 w-20 max-2xl:w-16 h-auto shadow-md border-4 group-hover:border-[#FF864E]">
                    <img src="/images/icon/tel.png" alt="" class="w-full h-full">
                </div>

                <p>06-1591-1124</p>
            </a>
            <a href="" target="_blank" class="flex gap-2 items-center group">
                <div
                    class="bg-white rounded-full p-2 w-20 max-2xl:w-16 h-auto shadow-md border-4 group-hover:border-[#FF864E]">
                    <img src="/images/icon/line1.png" alt="" class="w-full h-full">
                </div>
                <p>adminhhp</p>
            </a>
            <a href="https://maps.app.goo.gl/oDGBgfHj72SbTPHJ6" class="flex gap-4 items-center group cursor-pointer ">
                <div
                    class="bg-white rounded-full p-2 w-20 max-2xl:w-16 h-auto shadow-md border-4 group-hover:border-[#FF864E]">
                    <img src="/images/icon/90.png" alt="" class="w-full h-full">
                </div>
                <p class="w-full max-w-md max-xl:w-[250px] max-sm:w-[250px]">123 ถนนมิตรภาพ ตำบลในเมือง อำเภอเมือง
                    จังหวัดขอนแก่น จ.ขอนแก่น 40000</p>
            </ฟ>
        </div>

    </section>
    <div class="shadow-md w-full h-[450px] max-md:h-[300px] max-sm:h-[200px]">
       {!! $location->iframe !!}
    </div>


@endsection
@section('script')
    @vite('resources/js/accom/accom.js')

@endsection
