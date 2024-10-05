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

    <div class="relative">
        <section class="w-4/5 flex flex-col gap-4 relative  py-10 bg-white mx-auto">
            <p class="text-[#23404A] font-bold text-center text-3xl max-md:text-xl z-40 max-md:px-2" data-aos="zoom-in"
                data-aos-duration="2000">ตารางกำหนดการสัมมนา
            </p>
            <p class="text-[#23404A] text-center text-xl max-lg:text-lg max-sm:text-[1rem] z-40 max-md:px-2"
                data-aos="zoom-in" data-aos-duration="3000">Lorem ipsum dolor sit amet consectetur. Blandit sed tincidunt
                sit
                purus lacus consectetur nulla montes.</p>

            <div class="my-12 flex flex-col gap-6 ">
                <p class="text-[#FF864E] font-bold text-center text-3xl max-md:text-xl z-40 max-md:px-2" data-aos="zoom-in"
                    data-aos-duration="2000">{{$post->title}}</p>
                <div class="border-[1px] border-[#FF864E] rounded-full"></div>
                <p class="text-[#23404A] text-center text-xl max-lg:text-lg max-sm:text-[1rem] z-40 max-md:px-2"
                    data-aos="zoom-in" data-aos-duration="3000">{{$post->description}}</p>
            </div>

            <div class="max-w-[1200px] h-[400px] max-xl:h-[300px] max-xl:w-full max-sm:h-[250px] mx-auto shadow-md"
                data-aos="zoom-in-up" data-aos-duration="3000">
                <img src="{{ url(is_string($post->thumbnail_link) ? $post->thumbnail_link : '') }}" alt="" class="w-full h-full">
            </div>
        </section>

        @if(count($post['scheduleTimes']) > 0)
        <section class="w-4/5 mx-auto pb-10 bg-white" data-aos="fade-up" data-aos-duration="3000">
            <p class="bg-[#FF864E] pl-[5rem] max-lg:pl-[1rem] py-4 text-white text-xl font-medium rounded-t-lg">ตารางสัมมนา
            </p>

            {{-- @dd($post['scheduleTimes']) --}}
            @foreach($post['scheduleTimes'] as $time)
                <div
                    class="pl-[5rem] max-lg:pl-[1rem] flex py-4 gap-4 justify-start max-sm:flex-col text-lg max-lg:text-[1rem]  text-[#23404A]">
                    <p class="font-medium w-[20%] max-lg:w-[50%]">{{ substr($time->time_start, 0, 5) }} - {{ substr($time->time_end, 0, 5) }} น.</p>
                    <p class="">{{$time->description}}</p>
                </div>
                <hr>
            @endforeach
        </section>
        @endif

        @if(count($rooms) > 0)
        <section class="w-4/5 mx-auto bg-white" data-aos="fade-up" data-aos-duration="3000">
            <p class="text-xl font-medium text-[#23404A]">กรุณาเลือกห้องเพื่อเเสดงกำหนดการ</p>
            <div class="flex py-4 gap-6 justify-start max-xl:flex-col">
                <div
                    class="flex flex-col  gap-4 gap-y-4 max-xl:flex-row  max-xl:justify-between items-center max-sm:grid max-sm:grid-cols-2 place-items-center">
                    @foreach ($rooms as $room)
                        <button
                            class="room-btn w-[150px] max-sm:w-[140px] bg-white hover:bg-[#BCEB77] hover:text-[#37580C] hover:scale-110 text-[#32421E] font-bold py-3 px-4 border-2 border-[#88bb3d] rounded-lg text-lg cursor-pointer {{ $room->id == 1 ? 'active' : '' }}"
                            data-room="{{ $room->id }}">
                            {{ $room->title }}
                        </button>
                    @endforeach
                </div>

                {{-- ข้อมูล --}}
                {{-- @for ($room->id = 1; $room->id <= 5; $room->id++)
                    <div class="room-data flex flex-col bg-[#F7FAF3] rounded-lg p-6 w-full {{ $room->id == 1 ? '' : 'hidden' }}"
                        data-room="{{ $room->id }}">
                        <p class="text-xl font-medium text-[#23404A] mb-4">ห้องที่ {{ $room->id }} Update Knowledge and
                            Innovation Trends in</p>
                        @for ($j = 0; $j <= 5; $j++)
                            <div
                                class="flex py-4 gap-4 justify-start text-lg max-lg:text-[1rem] text-[#23404A] max-sm:flex-col">
                                <p class="font-medium w-[20%] max-lg:w-[50%]">08:30 - 08:45 น.</p>
                                <p>Forum I: Perspective View: Trends & Driving Role of Innovation in Health & Wellness
                                    Industry
                                    (รมต /ผู้แทน ที่เกี่ยวข้องใน supply chain) <br>Moderator : ศ.ดร.ศุภชัย ปทุมนากุล
                                    รองปลัดกระทรวงอุดมศึกษา
                                    วิทยาศาสตร์ วิจัยและนวัตกรรม (อว.)
                                </p>
                            </div>
                            <hr>
                        @endfor
                    </div>
                @endfor --}}
                @foreach ($rooms as $room)
                <div class="room-data flex flex-col bg-[#F7FAF3] rounded-lg p-6 w-full {{ $room->id == 1 ? '' : 'hidden' }}"
                    data-room="{{ $room->id }}">
                    <p class="text-xl font-medium text-[#23404A] mb-4">{{$room->description}}</p>
                    @foreach ($room['scheduleTimes'] as $time)
                        <div
                            class="flex py-4 gap-4 justify-start text-lg max-lg:text-[1rem] text-[#23404A] max-sm:flex-col">
                            <p class="font-medium w-[20%] max-lg:w-[50%]">{{ substr($time->time_start, 0, 5) }} - {{ substr($time->time_end, 0, 5) }} น.</p>
                            <p>{{$time->description}}</p>
                        </div>
                        <hr>
                    @endforeach
                </div>
            @endforeach
            </div>
        </section>
        @endif

        <div class="w-[50px] h-[50px] fixed right-4 bottom-[12rem] max-xl:bottom-[18rem] max-md:right-2 max-md:bottom-[16.5rem] cursor-pointer hidden"
            id="BackToTop">
            <img src="/images/backToTop.png" alt="">
        </div>
    </div>
@endsection

@section('script')
    @vite('resources/js/schedule/schedule.js')
@endsection
