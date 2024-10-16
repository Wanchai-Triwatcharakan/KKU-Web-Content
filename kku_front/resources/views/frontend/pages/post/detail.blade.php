@extends('frontend.layouts.layout-main')
@section('title', 'Post')
@section('head')
    <meta property="og:title" content="{{ $news->title }}" />
    <meta property="og:description" content="{{ $news->description }}" />
    <meta property="og:image" content="{{ url($news->thumbnail_link) }}" />
    <meta property="og:url" content="{{ url('post/detail/' . $news->id) }}" />
@endsection
@section('content')

    <section class="w-4/5 mt-[5rem] max-xl:mt-[4rem] mx-auto py-20 max-sm:pt-20 max-sm:pb-8 flex flex-col gap-4">
        <div class="w-[1080px] h-[500px] max-xl:w-full max-xl:max-h-[300px] mx-auto rounded-xl" data-aos="zoom-in"
            data-aos-duration="3000">
            <img src="{{ url($news->thumbnail_link) }}" alt="" class="w-full h-full rounded-xl object-cover">
        </div>

        <div class="mt-16 flex flex-col gap-4">
            <div class="relative z-40 w-[550px] max-sm:w-[350px] mx-auto">
                <p class="text-[#23404A] font-bold text-center text-3xl max-md:text-xl max-sm:text-lg z-40 max-md:px-2"
                    data-aos="zoom-in" data-aos-duration="3000">{{ $news->title }}</p>
            </div>
            <div class="relative z-40 w-[600px] max-sm:w-full mx-auto">
                <p class="text-[#75868B] font-[300] text-center text-xl max-lg:text-lg max-sm:text-[1rem] pt-2 z-40"
                    data-aos="zoom-in" data-aos-duration="3000">{{ $news->description }}</p>
            </div>
        </div>

        <div class="flex justify-end gap-4 text-[#75868B] items-center my-4 max-xl:justify-center" data-aos="flip-down"
            data-aos-duration="3000">
            <div class="flex gap-2 items-center">
                <div class="max-w-[20px] h-[20px]">
                    <img src="/images/home/Group 178.png" alt="" class="w-full h-full object-cover">
                </div>
                <p class="text-[#B9BBC7] text-md max-md:text-sm text-start">
                    {{ \Carbon\Carbon::parse($news->date_begin_display)->format('d/m/Y') }}</p>

            </div>
            <div class="flex gap-2 items-center">
                <div class="max-w-[20px] h-[20px]">
                    <img src="/images/home/person.png" alt="" class="w-full h-full object-cover">
                </div>
                <p class="text-[#B9BBC7] text-md max-md:text-sm text-start">
                    Admin</p>
            </div>

            <div id="facebookShareButton"
                class="flex gap-2 items-center relative cursor-pointer transition-all ease-in-out before:transition-[width] before:ease-in-out before:duration-700 before:absolute before:bg-[#bceb77] before:origin-center before:h-[2px] before:w-0 hover:before:w-[50%] before:bottom-0 before:left-[50%] after:transition-[width] after:ease-in-out after:duration-700 after:absolute after:bg-[#bceb77] after:origin-center after:h-[2px] after:w-0 hover:after:w-[50%] after:bottom-0 after:right-[50%] "
                data-url="{{ url('post/detail/' . $news->id) }}">
                <div class="max-w-[18px] h-[18px]">
                    <img src="/images/home/fb.png" alt="" class="w-full h-full object-cover">
                </div>
                <p class="text-[#B9BBC7] text-md max-md:text-sm text-start">
                    Facebook</p>
            </div>


        </div>

        <div class="flex flex-col gap-6" data-aos="zoom-in" data-aos-duration="3000">
            {{-- <p class="text-[#75868B] font-light text-left text-lg pt-2 indent-12"> Lorem ipsum dolor sit amet consectetur.
                Sit urna iaculis cursus morbi egestas. Arcu pulvinar adipiscing in
                sagittis quisque in nibh. Eleifend sed rutrum egestas in nulla. Sollicitudin ullamcorper mi commodo tempor
                maecenas tristique a. Ut eget aliquam est at quam et blandit auctor. Sociis id accumsan risus nulla et
                adipiscing eget. Lacus et ornare vel dictum. Integer pellentesque felis dignissim quisque pharetra arcu
                lacus id fermentum. Tellus commodo tempor eget pellentesque. Eu augue sociis nunc risus nisi. Enim orci
                donec netus viverra varius aliquam. Quam sagittis nulla quisque urna hendrerit ut quam morbi. Elit tristique
                netus lorem vulputate id tincidunt nisi. Ultrices ornare in elementum.</p>
            <div class="w-[800px] h-[400px] max-xl:w-full max-xl:max-h-[300px] mx-auto rounded-xl ">
                <img src="/images/banner/image122.png" alt="" class="w-full h-full rounded-xl">
            </div>
            <p class="text-[#75868B] font-light text-left text-lg pt-2 indent-12"> Lorem ipsum dolor sit amet consectetur.
                Sit urna iaculis cursus morbi egestas. Arcu pulvinar adipiscing in
                sagittis quisque in nibh. Eleifend sed rutrum egestas in nulla. Sollicitudin ullamcorper mi commodo tempor
                maecenas tristique a. Ut eget aliquam est at quam et blandit auctor. Sociis id accumsan risus nulla et
                adipiscing eget. </p> --}}

            {{-- content CK Editor --}}
            <div>
                {!! $news->content !!}
            </div>
        </div>

        <div class="flex justify-between items-center mt-16">
            @if ($previousNews)
                <a href="{{ url('post/detail/' . $previousNews->id) }}"
                    class="bg-[#BCEB77] flex gap-4 items-center justify-center p-2 rounded-md w-[120px] font-medium text-[#27363C] text-[1rem] hover:bg-[#E7E7E7] group"data-aos="fade-left"
                    data-aos-duration="3000">
                    <div class="w-6 h-6">
                        <svg fill="currentColor" class="flex-shrink-0 w-full h-full text-[#23404A] transition duration-75"
                            version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 492.004 492.004" xml:space="preserve"
                            transform="matrix(-1, 0, 0, 1, 0, 0)">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <g>
                                        <path
                                            d="M484.14,226.886L306.46,49.202c-5.072-5.072-11.832-7.856-19.04-7.856c-7.216,0-13.972,2.788-19.044,7.856l-16.132,16.136 c-5.068,5.064-7.86,11.828-7.86,19.04c0,7.208,2.792,14.2,7.86,19.264L355.9,207.526H26.58C11.732,207.526,0,219.15,0,234.002 v22.812c0,14.852,11.732,27.648,26.58,27.648h330.496L252.248,388.926c-5.068,5.072-7.86,11.652-7.86,18.864 c0,7.204,2.792,13.88,7.86,18.948l16.132,16.084c5.072,5.072,11.828,7.836,19.044,7.836c7.208,0,13.968-2.8,19.04-7.872 l177.68-177.68c5.084-5.088,7.88-11.88,7.86-19.1C492.02,238.762,489.228,231.966,484.14,226.886z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>ก่อนหน้า
                </a>
            @else
                <a href="#"
                    class="bg-[#E7E7E7] flex gap-4 items-center justify-center p-2 rounded-md w-[120px] font-medium text-[#27363C] text-[1rem] group"data-aos="fade-left"
                    data-aos-duration="3000">
                    <div class="w-6 h-6">
                        <svg fill="currentColor" class="flex-shrink-0 w-full h-full text-[#23404A] transition duration-75"
                            version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 492.004 492.004" xml:space="preserve"
                            transform="matrix(-1, 0, 0, 1, 0, 0)">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <g>
                                        <path
                                            d="M484.14,226.886L306.46,49.202c-5.072-5.072-11.832-7.856-19.04-7.856c-7.216,0-13.972,2.788-19.044,7.856l-16.132,16.136 c-5.068,5.064-7.86,11.828-7.86,19.04c0,7.208,2.792,14.2,7.86,19.264L355.9,207.526H26.58C11.732,207.526,0,219.15,0,234.002 v22.812c0,14.852,11.732,27.648,26.58,27.648h330.496L252.248,388.926c-5.068,5.072-7.86,11.652-7.86,18.864 c0,7.204,2.792,13.88,7.86,18.948l16.132,16.084c5.072,5.072,11.828,7.836,19.044,7.836c7.208,0,13.968-2.8,19.04-7.872 l177.68-177.68c5.084-5.088,7.88-11.88,7.86-19.1C492.02,238.762,489.228,231.966,484.14,226.886z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>ก่อนหน้า
                </a>
            @endif

            @if ($nextNews)
                <a href="{{ url('/post/detail/' . $nextNews->id) }}"
                    class="bg-[#BCEB77] flex gap-4 items-center justify-center p-2 rounded-md font-medium w-[120px] text-[#27363C] text-[1rem] hover:bg-[#E7E7E7] group"
                    data-aos="fade-right" data-aos-duration="3000">
                    ถัดไป
                    <div class="w-6 h-6">
                        <svg fill="currentColor" class="flex-shrink-0 w-full h-full text-[#23404A] transition duration-75"
                            version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 492.004 492.004" xml:space="preserve"
                            transform="matrix(1, 0, 0, 1, 0, 0)">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <g>
                                        <path
                                            d="M484.14,226.886L306.46,49.202c-5.072-5.072-11.832-7.856-19.04-7.856c-7.216,0-13.972,2.788-19.044,7.856l-16.132,16.136 c-5.068,5.064-7.86,11.828-7.86,19.04c0,7.208,2.792,14.2,7.86,19.264L355.9,207.526H26.58C11.732,207.526,0,219.15,0,234.002 v22.812c0,14.852,11.732,27.648,26.58,27.648h330.496L252.248,388.926c-5.068,5.072-7.86,11.652-7.86,18.864 c0,7.204,2.792,13.88,7.86,18.948l16.132,16.084c5.072,5.072,11.828,7.836,19.044,7.836c7.208,0,13.968-2.8,19.04-7.872 l177.68-177.68c5.084-5.088,7.88-11.88,7.86-19.1C492.02,238.762,489.228,231.966,484.14,226.886z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>

                </a>
            @else
                <a href="#"
                    class="bg-[#E7E7E7] flex gap-4 items-center justify-center p-2 rounded-md font-medium w-[120px] text-[#27363C] text-[1rem] group"
                    data-aos="fade-right" data-aos-duration="3000">
                    ถัดไป
                    <div class="w-6 h-6">
                        <svg fill="currentColor" class="flex-shrink-0 w-full h-full text-[#23404A] transition duration-75"
                            version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 492.004 492.004" xml:space="preserve"
                            transform="matrix(1, 0, 0, 1, 0, 0)">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <g>
                                        <path
                                            d="M484.14,226.886L306.46,49.202c-5.072-5.072-11.832-7.856-19.04-7.856c-7.216,0-13.972,2.788-19.044,7.856l-16.132,16.136 c-5.068,5.064-7.86,11.828-7.86,19.04c0,7.208,2.792,14.2,7.86,19.264L355.9,207.526H26.58C11.732,207.526,0,219.15,0,234.002 v22.812c0,14.852,11.732,27.648,26.58,27.648h330.496L252.248,388.926c-5.068,5.072-7.86,11.652-7.86,18.864 c0,7.204,2.792,13.88,7.86,18.948l16.132,16.084c5.072,5.072,11.828,7.836,19.044,7.836c7.208,0,13.968-2.8,19.04-7.872 l177.68-177.68c5.084-5.088,7.88-11.88,7.86-19.1C492.02,238.762,489.228,231.966,484.14,226.886z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>

                </a>
            @endif

        </div>

    </section>



@endsection
@section('script')
    @vite('resources/js/post/shareBtn.js')
@endsection
