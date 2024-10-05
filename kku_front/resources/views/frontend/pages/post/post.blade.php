@extends('frontend.layouts.layout-main')
@section('title', 'Post')
@section('style')
    {{-- <link rel="stylesheet" href="/css/aboutus.min.css"> --}}
@endsection
@section('content')

    <section class="mt-[4.5rem] max-xl:mt-[3rem] w-full h-[500px] max-xl:h-[350px] max-sm:h-[250px] relative z-50">
        <div class="absolute inset-0 z-50 flex flex-col justify-center items-center gap-y-4 max-sm:gap-y-2 px-4">
            <p class="text-white text-6xl max-xl:text-3xl max-md:text-2xl  font-bold text-center" data-aos="zoom-in"
                data-aos-duration="3000">
                ข่าวสาร
            </p>
        </div>

        <img src="/images/banner/image122.png" alt="" class="w-full h-full absolute object-cover">
    </section>

    <section class="w-4/5 max-xl:w-full mx-auto py-10 bg-white px-4">
        <div class="flex gap-4 max-lg:flex-col">
            <div class="w-[40%] max-lg:w-full flex flex-col gap-4" data-aos="fade-up"ata-aos-duration="3000">
                <form class="flex items-center w-full mx-auto">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none text-[#929292]">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" id="simple-search"
                            class="no-underline bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full ps-10 p-2.5 focus:outline-none"
                            placeholder="Search" required />
                    </div>
                    <button type="submit"
                        class="p-2 w-28 ms-2 text-[1rem] font-medium text-white bg-[#BCEB77] rounded-lg border border-[#BCEB77] hover:bg-[#cbf191]">
                        <span class="">ค้นหา</span>
                    </button>
                </form>

                <div class="border shadow-md  rounded-md items-center flex flex-col gap-y-4 py-4 max-yy:justify-start">
                    <div class="flex gap-2 items-center justify-start px-2 w-full">
                        <div class="w-8 h-8 text-left hover:text-white flex justify-start items-center">
                            <svg viewBox="0 0 15 15" class="w-full h-full text-[#23404A] transition duration-75"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M9.875 7.5C9.875 8.81168 8.81168 9.875 7.5 9.875C6.18832 9.875 5.125 8.81168 5.125 7.5C5.125 6.18832 6.18832 5.125 7.5 5.125C8.81168 5.125 9.875 6.18832 9.875 7.5Z"
                                        class="fill-current"></path>
                                </g>
                            </svg>
                        </div>
                        <p class="text-[#23404A] text-left font-medium text-2xl max-md:text-xl px-4 max-yy:p-0">โพสต์ยอดนิยม
                        </p>
                        <div class="border-2 border-[#23404A] rounded-full px-4 flex-grow "></div>
                    </div>

                    <div
                        class="grid grid-cols-1 max-lg:grid-cols-2  max-md:grid-cols-1 max-md:h-[600px] max-md:overflow-y-auto">
                        @php $i = 1; @endphp
                        @foreach ($pinnedNews as $news)
                            <div class="flex gap-4  justify-between px-4">
                                <p class="text-[#23404A] font-medium text-5xl">{{ $i++ }}</p>
                                <div
                                    class="flex flex-col gap-2 relative cursor-pointer transition-all ease-in-out before:transition-[width] before:ease-in-out before:duration-700 before:absolute before:bg-[#bceb77] before:origin-center before:h-[2px] before:w-0 hover:before:w-[50%] before:bottom-0 before:left-[50%] after:transition-[width] after:ease-in-out after:duration-700 after:absolute after:bg-[#bceb77] after:origin-center after:h-[2px] after:w-0 hover:after:w-[50%] after:bottom-0 after:right-[50%] pb-2">

                                    <a href="{{ url('post/detail/'.$news->id) }}" target="_blank"
                                        class="text-[#23404A] font-medium text-xl max-yy:text-lg max-md:text-md">{{$news->title}}</a>

                                    <div class="flex gap-2 w-full">
                                        <div class="max-w-[20px] h-[20px]">
                                            <img src="/images/home/Group 178.png" alt=""
                                                class="w-full h-full object-cover">
                                        </div>
                                        <p class="text-[#B9BBC7] text-md max-md:text-sm text-start">{{ \Carbon\Carbon::parse($news->date_begin_display)->format('d/m/Y') }}</p>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
         
            <div class="w-full p-2 grid grid-cols-3 gap-6 max-yy:grid-cols-2 max-dm:grid-cols-2 max-ex:grid-cols-1 place-items-center h-full">
                
                    @foreach ($allnews as $news)
                        <div class="drop-shadow-md max-w-[340px] max-es:w-[350px] flex justify-center overflow-hidden"data-aos="fade-up"
                            data-aos-duration="1500">
                            <div class="bg-white rounded-[15px] z-0 flex flex-col justify-center gap-y-4 ">
                                <div class="w-full h-[300px] mx-auto rounded-t-xl ">
                                    <img src="{{ url($news->thumbnail_link) }}" alt=""
                                        class="w-full h-full object-cover rounded-t-xl">
                                </div>

                                <div class="flex flex-col justify-center gap-y-4 px-3">
                                    <p class="text-[#23404A] font-bold text-lg max-md:text-md text-start">
                                        {{ $news->title }}
                                    </p>
                                    <div class="flex items-center gap-2">

                            <div class="flex justify-end mt-4">
                                <a href="{{ url('post/detail/'.$news->id) }}"  target="_blank"
                                    class="text-center font-medium text-[#FF864E] p-2 rounded-full text-[1rem] w-36 cursor-pointer hover:scale-105 transition duration-500">
                                    ดูเพิ่มเติม >></a>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </section>

    <div class="flex justify-center items-center gap-2 mb-12 ">
        <a href=""
            class="flex justify-center items-center border border-[#84B750] w-10 h-10 rounded-md text-xl font-bold hover:bg-[#84B750] hover:text-white"
            data-aos="zoom-in" data-aos-duration="2000">
            < </a>
                <span
                    class="flex justify-center items-center border border-[#84B750] w-10 h-10 rounded-md text-lg font-semibold cursor-pointer hover:bg-[#84B750] hover:text-white"
                    data-aos="zoom-in" data-aos-duration="2000">1</span>
                <span
                    class="flex justify-center items-center border border-[#84B750] w-10 h-10 rounded-md text-lg font-semibold cursor-pointer hover:bg-[#84B750] hover:text-white"
                    data-aos="zoom-in" data-aos-duration="2000">2</span>
                <span
                    class="flex justify-center items-center border border-[#84B750] w-10 h-10 rounded-md text-lg font-semibold cursor-pointer hover:bg-[#84B750] hover:text-white"
                    data-aos="zoom-in" data-aos-duration="2000">3</span>
                <a href=""
                    class="flex justify-center items-center border border-[#84B750] w-10 h-10 rounded-md text-xl font-bold hover:bg-[#84B750] hover:text-white"
                    data-aos="zoom-in" data-aos-duration="3000">></a>
    </div>


@endsection
@section('script')
@endsection
