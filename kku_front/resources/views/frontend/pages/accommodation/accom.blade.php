@extends('frontend.layouts.layout-main')
@section('title', 'Accommodation')
@section('style')
    {{-- <link rel="stylesheet" href="/css/aboutus.min.css"> --}}
@endsection
@section('content')

    <section class="mt-[4.5rem] max-xl:mt-[3rem] w-full h-[500px] max-xl:h-[350px] max-sm:h-[250px] relative z-50">
        <div class="absolute inset-0 z-50 flex flex-col justify-center items-center gap-y-4 max-sm:gap-y-2 px-4">
            <p class="text-white text-6xl max-xl:text-3xl  font-bold text-center" data-aos="zoom-in" data-aos-duration="3000">
                ที่พักและเส้นทาง
            </p>
        </div>

        <img src="/images/banner/image122.png" alt="" class="w-full h-full absolute object-cover ">
    </section>

    <section class="w-4/5 max-sm:w-[90%] mx-auto relative h-[100vh] items-center flex justify-center">
        <div class="flex justify-center items-center max-lg:absolute">
            <div class="bg-[#B8D88F] w-[150px] h-[100vh] "></div>
        </div>

        <div class="max-lg:flex max-lg:flex-col gap-y-6 max-lg:relative max-lg:py-10">
            <div data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="3000"
                class="bg-white border px-8 rounded-lg shadow-lg lg:absolute z-30 flex flex-col gap-y-6 justify-center w-[690px] h-[500px] max-uu:w-[550px]  max-uu:h-[450px] right-[25rem]  max-uu:right-[15rem] max-yi:right-0 max-yy:right-[5rem] max-uu:top-[20rem]  max-xl:right-0 max-xl:max-w-[450px]  max-xl:max-h-[350px] max-sm:max-w-[350px]  max-sm:max-h-[350px] ">
                <div class="">
                    <p class="text-[#84B750] text-3xl max-md:text-2xl font-semibold">โรงแรมโฆษะ ขอนแก่น</p>
                    <p class="text-[#23404A] text-lg max-md:text-[1rem] font-medium">Kosa Hotel Khonkaen</p>
                </div>

                <div class="flex flex-col gap-2">
                    <div class="flex gap-2 items-center">
                        <img src="/images/icon/line1.png" alt="" class="w-6 h-6">
                        <p>kosahotel khonkaen LINE ID: @kosahotel</p>
                    </div>
                    <div class="flex gap-2 items-center">
                        <img src="/images/icon/90.png" alt="" class="w-6 h-6">
                        <p>ที่อยู่ : 250 252 ถนนศรีจันทร์ ตำบลในเมือง
                            อำเภอเมืองขอนแก่น ขอนแก่น 40000</p>
                    </div>
                    <a href="tel:043-320-320" class="flex  gap-2 items-center">
                        <img src="/images/icon/tel.png" alt="" class="w-6 h-6">

                        <p>โทรศัพท์ : 043-320-320</p>
                    </a>
                    <a href="https://maps.app.goo.gl/oDGBgfHj72SbTPHJ6" target="_blank" class="flex gap-2 items-center">
                        <img src="/images/icon/map.png" alt="" class="w-6 h-6">
                        <p>ลิ้งก์แผนที่ : maps.app.goo.gl/UNQt1RFwmxrMy1Aa7</p>
                    </a>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="3000"
                class=" max-uu:w-[550px]  max-uu:h-[450px] lg:absolute rounded-lg shadow-lg left-[20rem] top-[15rem] max-uu:left-[15rem] max-uu:top-24 max-yy:left-[5rem] max-yi:left-0  max-yy:top-[6rem] max-xl:left-0 max-xl:w-[450px]  max-xl:h-[350px] max-sm:max-w-[350px]  max-sm:max-h-[350px]">
                <img src="/images/Rectangle 199.png" alt="" class="w-full h-full rounded-lg object-cover">
            </div>
        </div>
    </section>

    <section class="relative bg-[#F4FCFF] flex flex-col gap-4 Z-50 pb-4">
        <p class="text-[#23404A] font-bold text-center text-4xl max-md:text-2xl z-50 max-md:px-2 pt-16 max-sm:pt-8"
            data-aos="zoom-in" data-aos-duration="3000">{{$location->description}}</p>
        <div class="mt-4 shadow-md w-full h-[450px] max-md:h-[300px] max-sm:h-[200px]">
            {!! $location->iframe !!}
        </div>
    </section>

    <section
        class="w-4/5 max-sm:w-[90%] mx-auto relative bg-white flex flex-col justify-center items-center gap-4 Z-50 pb-12">
        <p class="text-[#23404A] font-bold text-center text-4xl max-md:text-2xl z-50 max-md:px-2 pt-16 max-sm:pt-8"
            data-aos="zoom-in" data-aos-duration="3000">{{$location->keyword}}</p>
        <div class="mt-4 shadow-md w-[800px] h-[800px] max-lg:h-[70%]  max-sm:h-[50%] max-lg:w-full boeder relative cursor-pointer"
            id="previewImage" data-aos="zoom-in" data-aos-duration="3000">
            <img src="{{$location->thumbnail_link}}" alt="" class="w-full h-full hadow-md object-cover">
            <div
                class="absolute inset-0 bg-gradient-to-b from-stone-500 to-black opacity-0 hover:opacity-75 flex justify-center items-center transition-opacity duration-300">
                <img src="/images/eye.png" alt="" class="w-auto h-auto max-w-12 max-h-12 opacity-100">
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div id="imageModal" class=" fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-75 z-[999]">
        <div
            class="relative bg-white p-4 w-[800px] h-[750px] max-lg:h-[70%]  max-sm:h-[50%] max-lg:w-full max-lg:mx-4 mx-auto">
            <button class="absolute top-2 right-2 text-white text-[1.5rem] bg-red-500 px-2 rounded"
                id="closeModal">&times;</button>
            <img src="{{$location->thumbnail_link}}" alt="Image Preview" class="w-full h-full" id="modalImage">
        </div>
    </div>

@endsection
@section('script')
    @vite('resources/js/accom/accom.js')

@endsection
