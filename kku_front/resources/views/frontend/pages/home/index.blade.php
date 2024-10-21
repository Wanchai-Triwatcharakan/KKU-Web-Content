@extends('frontend.layouts.layout-main')
@section('title', 'Home')
@section('style')
    @vite('resources/css/home.css')
@endsection

@section('content')
    @include('frontend.layouts.swiper')
    <div class="bg-white pt-32 max-sm:pt-20">
        <section class="flex flex-col gap-4 relative  bg-white ">
            <div class="relative z-40 w-[550px] max-sm:w-[350px] mx-auto">
                <p class="text-[#23404A] font-bold text-center text-3xl max-md:text-xl max-sm:text-lg z-40 max-md:px-2"
                    data-aos="zoom-in" data-aos-duration="3000">{{ $postOrigin->title }}</p>
            </div>
            <div class="relative z-40 w-[600px] max-sm:w-full mx-auto">
                <p class="text-[#23404A] font-[500] text-center text-2xl max-2xl:text-xl max-lg:text-lg max-sm:text-[1rem] z-40"
                    data-aos="zoom-in" data-aos-duration="3000">{{ $postOrigin->keyword }}</p>
            </div>


            <div class="relative z-40 flex max-xl:flex-col gap-6 justify-between w-4/5 max-md:w-full  mx-auto my-12 items-center"
                data-aos="zoom-in" data-aos-duration="3000">

                <div class="swiper swiper-container w-full ">
                    <div class="swiper-wrapper rounded-2xl sm:p-6 flex sm:justify-start ">
                        @foreach ($postOrigin['images'] as $image)
                            <div class="swiper-slide sm:px-6">
                                <div
                                    class="relative w-[600px] h-[400px] max-yy:w-[450px] max-yy:h-[350px] max-xl:w-full max-xl:h-[400px] max-md:w-[400px] max-md:h-[350px] max-sm:w-full max-sm:h-[350px] px-4 max-md:rounded-lg">
                                    <div
                                        class="bg-[#FFCAAE] drop-shadow-md w-full h-full rounded-2xl absolute -left-6 top-6 z-10 max-sm:hidden">
                                    </div>
                                    <img src="{{ url($image->image_link) }}" alt=""
                                        class="w-full h-full relative z-20 rounded-2xl drop-shadow-md object-cover">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

                <div class="flex flex-col w-full gap-y-6 justify-between max-xl:mt-6 px-4">
                    <div class="flex gap-6 items-center">
                        <div class="w-[50px] h-[50px]">
                            <img src="/images/home/meeting-call.png" alt="" class="w-full h-full ">
                        </div>
                        <p class="text-[#4BCAFF] font-bold text-3xl max-md:text-lg">ที่มาของการสัมมนา</p>
                    </div>
                    <div class="flex flex-col gap-y-6 text-[1rem] indent-8">
                        <p>{!! nl2br(e($postOrigin->description)) !!}</p>
                    </div>
                    <div class="flex justify-end">
                        <a href="{{ route('seminar.origin') }}" target="_blank"
                            class="text-center bg-[#FF864E] text-white p-2 rounded-md text-[1rem] w-36 cursor-pointer hover:bg-[#B8D88F] shadow-md">
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
                <div class="swiper swiper1 items-center w-4/5 mx-auto">
                    <div class="swiper-wrapper w-full mx-auto flex">
                        @foreach ($lecturer as $lect)
                            <a href="{{ route('seminar.lecturer') }}" target="_blank" data-aos="fade-up"
                                data-aos-duration="1000" class="swiper-slide" data-aos="flip-left">
                                <div class="drop-shadow-md max-w-[350px] h-[100%] py-4">
                                    <div
                                        class="bg-white rounded-[15px] py-4 px-3 z-0 flex flex-col justify-center gap-y-4 ">
                                        <div
                                            class="w-[215px] h-[215px] mx-auto bg-gradient-to-r from-[#8DD7FA] to-[#B8D88F] rounded-full p-2">
                                            <img src="{{ url($lect->thumbnail_link) }}" alt=""
                                                class="w-full h-full object-cover rounded-full">
                                        </div>

                                        <div class="flex flex-col justify-center gap-y-4">
                                            <div class="flex flex-col h-[60px]">
                                                <p class="text-[#23404A] font-bold text-center text-xl max-md:text-lg">
                                                    {{ $lect->title }}</p>
                                                <p
                                                    class="text-[#686868] font-[300] text-center text-[1rem] max-md:text-md ">
                                                    {{ $lect->topic }}</p>
                                            </div>
                                            <p
                                                class="text-[#686868] font-[300] text-[1rem] max-md:text-md text-start h-[110px] overflow-auto">
                                                {{ $lect->description }}
                                            </p>
                                        </div>

                                        <div class="flex justify-center mt-4">
                                            <p
                                                class="text-center bg-[#FF864E] text-white p-2 rounded-full text-[1rem] w-36 ">
                                                {{ \Carbon\Carbon::parse($lect->date_begin_display)->locale('th')->translatedFormat('d M Y') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach


                    </div>
                </div>
                <div class="swiper-button-next swiper-button-next1"></div>
                <div class="swiper-button-prev swiper-button-prev1"></div>
            </div>
        </section>

        <section class="relative bg-white pt-20 flex flex-col gap-4 Z-50">
            <p class="text-[#23404A] font-bold text-center text-4xl max-md:text-2xl max-sm:text-xl z-50 max-md:px-2"
                data-aos="zoom-in" data-aos-duration="3000">
                ลงทะเบียน
            </p>

            <div class="swiper mySwiper items-center w-4/5  max-ex:w-full mx-auto h-auto mt-4">
                <div class="swiper-wrapper w-full mx-auto flex">

                    @foreach ($regispost as $post)
                        <div class="swiper-slide" data-aos="fade-up" data-aos-duration="3000">
                            <div
                                class=" flex max-xl:flex-col gap-6 justify-between max-md:w-full  mx-auto items-center p-4 ">
                                <div
                                    class="drop-shadow-md border boder-2 flex flex-col gap-y-6 justify-between max-xl:mt-6 px-4 bg-white  rounded-2xl py-4 w-full max-xl:order-2 h-[450px] max-md:h-[350px] max-sm:h-[350px]">
                                    <div class="flex flex-col gap-6">
                                        <div class="flex gap-6 items-center">
                                            <div class="w-[50px] h-[50px]">
                                                <img src="/images/home/formkit_people.png" alt=""
                                                    class="w-full h-full object-cover">
                                            </div>
                                            <p class="text-[#84B750] font-bold text-2xl max-md:text-lg">ผู้เข้าร่วมอบรม</p>
                                        </div>
                                        <div
                                            class="flex flex-col justify-start gap-y-6 text-[1rem] indent-8 text-start max-h-[280px] max-sm:h-[180px] overflow-y-auto">
                                            <p>{{ $post->title }}</p>
                                            <p>{{ $post->description }}</p>
                                        </div>
                                    </div>
                                    <div class="flex justify-strat">
                                        <a href="{{ route('register.index') }}" target="_blank"
                                            class="text-center bg-[#FF864E] text-white p-2 rounded-md text-[1rem] w-36 cursor-pointer hover:bg-[#B8D88F] shadow-md">
                                            รายละเอียด
                                        </a>
                                    </div>
                                </div>

                                <div class="rounded-2xl drop-shadow-md w-full h-[450px] max-md:h-[350px] max-sm:h-[350px] max-md:rounded-lg"
                                    data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500"
                                    data-aos-duration="500">
                                    <img src="{{ url($post->thumbnail_link) }}" alt=""
                                        class="w-full h-full relative z-20 rounded-2xl shadow-md object-cover">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-pagination"></div>

        </section>

        <section class="relative bg-white flex flex-col gap-4 Z-50 py-8">
            <div class="absolute w-full h-full">
                <img src="images/home/Group 240.png" alt="Your Image" class="w-full h-full object-cover">
            </div>
            <p class="text-white font-bold text-center text-4xl max-md:text-2xl z-50 max-md:px-2 pt-10" data-aos="zoom-in"
                data-aos-duration="3000">
                ข่าวสาร
            </p>

            <div
                class="w-4/5  mx-auto py-10 max-ex:py-4 content-center grid grid-cols-4 gap-4 max-yy:grid-cols-3 max-xl:grid-cols-2 max-ex:grid-cols-1 place-items-center ">
                @foreach ($allnews as $news)
                    <div class="drop-shadow-md flex justify-center h-[100%]">
                        <div class="bg-white  w-[350px] max-2xl:w-[320px] max-xl:w-[350px] max-lg:w-[300px] max-sm:w-[350px] rounded-[15px] z-0 flex flex-col justify-center gap-y-4 "
                            data-aos="fade-up" data-aos-duration="1500">
                            <div class="w-full h-[300px] mx-auto rounded-t-xl ">
                                <img src="{{ url($news->thumbnail_link) }}" alt=""
                                    class="w-full h-full object-cover rounded-t-xl">
                            </div>

                            <div class="flex flex-col justify-center gap-y-4 px-3">
                                <p class="text-[#23404A] font-bold text-lg max-md:text-md text-start">{{ $news->title }}
                                </p>
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
                                        {{ \Carbon\Carbon::parse($news->date_begin_display)->format('d/m/Y') }}</p>

                                </div>

                                <p class="text-[#686868] font-[300] text-lg max-md:text-md flex text-start h-[120px] px-1 overflow-hidden text-ellipsis "
                                    style="word-break: break-word; white-space: normal;">
                                    {{ $news->description }}
                                </p>
                            </div>


                            <div class="flex justify-end my-4 px-4 ">
                                <a href="{{ url('post/detail/' . $news->id) }}" target="_blank"
                                    class="text-center font-medium text-[#FF864E]  rounded-full text-[1rem] relative cursor-pointer transition-all ease-in-out before:transition-[width] before:ease-in-out before:duration-700 before:absolute before:bg-[#bceb77] before:origin-center before:h-[2px] before:w-0 hover:before:w-[50%] before:-bottom-1 before:left-[50%] after:transition-[width] after:ease-in-out after:duration-700 after:absolute after:bg-[#bceb77] after:origin-center after:h-[2px] after:w-0 hover:after:w-[50%] after:-bottom-1 after:right-[50%] ">
                                    ดูเพิ่มเติม >></a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            <div class="relative flex justify-center mt-4 ">
                <a href="{{ route('post.index') }}" target="_blank"
                    class="text-center bg-[#FF864E] text-white hover:text-[#FF864E] hover:bg-white  p-2 rounded-md text-[1rem] w-36 cursor-pointer">
                    ดูทั้งหมด</a>
            </div>

        </section>

        <section class="relative bg-white flex flex-col gap-4 Z-50 pb-8 ">

            <p class="text-[#23404A] font-bold text-center text-4xl max-md:text-2xl z-50 max-md:px-2 pt-10"
                data-aos="zoom-in" data-aos-duration="3000">
                ภาพกิจกรรม
            </p>

            <div
                class="relative  z-50 w-4/5 max-ex:w-full  mx-auto py-10 max-ex:py-4 content-center grid grid-cols-3 gap-4 gap-y-6 max-yy:grid-cols-3 max-xl:grid-cols-2 max-ex:grid-cols-1 place-items-center">
                @foreach ($photoactivity as $photo)
                    {{-- @dd($photo) --}}
                    <a href="{{ url('activity/detail/' . $photo->id) }}" target="_blank"
                        class="shadow-md  shadow-[#C6E2F6] flex justify-center h-[100%] rounded-xl hover:scale-95"
                        data-aos="fade-up" data-aos-duration="1500">
                        <div
                            class="bg-white w-[350px] max-2xl:w-[320px] max-xl:w-[350px] max-lg:w-[300px] max-sm:w-[350px] rounded-[15px] z-0 flex flex-col justify-center gap-y-4  ">
                            <div class="w-full h-[300px] mx-auto rounded-t-xl relative">
                                <img src="{{ url($photo->thumbnail_link) }}" alt=""
                                    class="w-full h-full object-cover rounded-t-xl">
                                <div
                                    class="absolute inset-0 rounded-t-xl bg-gradient-to-b from-[#ffffff] to-[#84B750] opacity-0 hover:opacity-50 flex justify-center items-center transition-opacity duration-300">
                                </div>
                            </div>


                            <div class="flex flex-col justify-center gap-y-4 px-3 ">
                                <p class="text-[#686868] text-lg max-md:text-md text-center h-[120px] overflow-auto">
                                    {{ $photo->title }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="relative flex justify-center mt-4 z-50">
                <a href="{{ route('activity.index') }}" target="_blank"
                    class="text-center bg-[#FF864E] text-white p-2 rounded-md text-[1rem] w-36 cursor-pointer hover:bg-[#B8D88F] shadow-md">
                    ดูทั้งหมด</a>
            </div>

            <img src="/images/home/Group 50.png" alt=""
                class="absolute top-[6rem] left-0 w-[200px] max-2xl:w-[150px] max-lg:w-[100px] max-md:hidden">
            <img src="/images/home/Group 22.png" alt=""
                class="absolute top-0 right-0 w-[150px] max-lg:w-[100px] max-md:hidden">
            <img src="/images/home/Group 49.png" alt=""
                class="absolute  -bottom-[20rem] max-md:bottom-0 left-[20rem] max-lg:right-[20rem] max-sm:right-[8rem] w-[600px] max-2xl:w-[450px] max-lg:w-[300px] max-md:hidden">

        </section>

        {{-- @dd($location) --}}
        <section class="relative bg-[#F4FCFF] flex flex-col gap-4 Z-50 pb-4">
            <p class="text-[#23404A] font-bold text-center text-4xl max-md:text-2xl z-50 max-md:px-2 pt-16 max-sm:pt-8"
                data-aos="zoom-in" data-aos-duration="3000">{{ $location->title }}</p>
            <div class="mt-4 shadow-md w-full h-[450px] max-md:h-[300px] max-sm:h-[200px]">
                {!! $location->iframe !!}
            </div>
        </section>

        {{-- @dd($postsupport) --}}
        @if ($postsupport)
            <section class="py-10 mt-15 bg-white items-center relative z-50">
                <p class="text-[#23404A] font-bold text-center text-4xl max-md:text-2xl max-md:px-2" data-aos="zoom-in"
                    data-aos-duration="3000">{{ $postsupport->title }}</p>
                <div class="relative z-30 items-center mt-8">
                    <div class="swiper swiper2 items-center w-11/12 mx-auto">
                        <div class="swiper-wrapper w-full mx-auto flex">
                            @foreach ($postsupport->images as $image)
                                <div class="swiper-slide">
                                    <div class="flex justify-center items-center h-[120px] mx-auto msx-sm:px-8">
                                        <div class="flex justify-center items-center" data-aos="zoom-in"
                                            data-aos-duration="3000">
                                            <img src="{{ url($image->image_link) }}" alt=""
                                                class="w-full h-full">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-button-next swiper-button-next2"></div>
                    <div class="swiper-button-prev swiper-button-prev2"></div>
                </div>
            </section>

        @endif
    </div>
@endsection

@section('script')
    @vite('resources/js/home/swiper.js')
@endsection
