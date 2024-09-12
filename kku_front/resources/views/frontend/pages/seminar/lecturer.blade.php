@extends('frontend.layouts.layout-main')
@section('title', 'Lecturer')
@section('style')
    {{-- <link rel="stylesheet" href="/css/aboutus.min.css"> --}}
@endsection
@section('content')

    <section class="mt-[4.5rem] max-xl:mt-[3rem] w-full h-[500px] max-xl:h-[350px] max-sm:h-[250px] relative z-50">
        <div class="absolute inset-0 z-50 flex flex-col justify-center items-center gap-y-4 max-sm:gap-y-2 px-4">
            <p class="text-white text-6xl max-xl:text-3xl max-md:text-2xl  font-bold text-center" data-aos="zoom-in"
                data-aos-duration="3000">
                วิทยากร
            </p>
        </div>

        <img src="/images/banner/image1.png" alt="" class="w-full h-full absolute object-cover">
    </section>




    <section class="flex flex-col gap-4 pt-10 bg-white ">
        <p class="text-[#23404A] font-bold text-center text-3xl max-md:text-xl max-sm:text-lg z-40 max-md:px-2"
            data-aos="zoom-in" data-aos-duration="3000">วิทยากร
        </p>
        <p class="text-[#23404A] font-medium text-center text-2xl max-2xl:text-xl max-lg:text-lg max-sm:text-[1rem] z-40 max-md:px-2"
            data-aos="zoom-in" data-aos-duration="3000">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

        <div
            class=" grid grid-cols-4 gap-4 max-yy:grid-cols-3 max-dm:grid-cols-2 max-ex:grid-cols-1 w-[70%] max-md:w-full mx-auto my-12 items-center ">

            @for ($i = 0; $i < 8; $i++)
                <div data-aos="fade-up" data-aos-duration="1000" class="swiper-slide" data-aos="flip-left">
                    <div class="shadow-md shadow-[#C6E2F6] max-w-[350px] h-[100%] rounded-[15px]"
                        style="border: 1px solid #C6E2F6;">

                        <div class="bg-white rounded-[15px] py-4 px-3 z-0 flex flex-col justify-center gap-y-4  ">
                            <div
                                class="w-[215px] h-[215px] mx-auto bg-gradient-to-r from-[#8DD7FA] to-[#B8D88F] rounded-full p-1">
                                <img src="images/home/111.png" alt=""
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
                                <p class="text-center bg-[#FF864E] text-white p-2 rounded-full text-[1rem] w-36 ">
                                    13 พ.ย. 2567</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor

        </div>

    </section>

    {{--  {{ $products->previousPageUrl() }} {{ $products->currentPage() }}{{ $products->lastPage() }} {{ $products->nextPageUrl() }} --}}
    {{-- <div class="my-4 flex justify-center max-xs:justify-center items-center gap-4 hover:bg-[#84B750]">
        <div
            class="w-64  bg-red-700 rounded-lg  flex justify-between items-center">
            <a href=""
                class="px-2 py-1 border-r rounded-l-lg ">Previous</a>
            <span class="mr-2">Page 1 of 10</span>
            <a href=""
                class="px-2 py-1 border-l rounded-r-lg hover-button">Next</a>
        </div>style="border: 1px solid #84B750; "
    </div> --}}
    
    <div class="flex justify-center items-center gap-2 mb-12 "  >
        <a href=""  class="flex justify-center items-center border border-[#84B750] w-10 h-10 rounded-md text-xl font-bold hover:bg-[#84B750] hover:text-white" data-aos="zoom-in" data-aos-duration="2000"> < </a>
        <span class="flex justify-center items-center border border-[#84B750] w-10 h-10 rounded-md text-lg font-semibold cursor-pointer hover:bg-[#84B750] hover:text-white" data-aos="zoom-in" data-aos-duration="2000">1</span>
        <span class="flex justify-center items-center border border-[#84B750] w-10 h-10 rounded-md text-lg font-semibold cursor-pointer hover:bg-[#84B750] hover:text-white" data-aos="zoom-in" data-aos-duration="2000">2</span>
        <span class="flex justify-center items-center border border-[#84B750] w-10 h-10 rounded-md text-lg font-semibold cursor-pointer hover:bg-[#84B750] hover:text-white" data-aos="zoom-in" data-aos-duration="2000">3</span>
        <a href="" class="flex justify-center items-center border border-[#84B750] w-10 h-10 rounded-md text-xl font-bold hover:bg-[#84B750] hover:text-white" data-aos="zoom-in" data-aos-duration="3000">></a>
    </div>

@endsection
@section('script')
@endsection
