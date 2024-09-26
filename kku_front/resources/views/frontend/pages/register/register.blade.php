@extends('frontend.layouts.layout-main')
@section('title', 'Register')
@section('style')
    {{-- <link rel="stylesheet" href="/css/aboutus.min.css"> --}}
@endsection
@section('content')

    <section class="mt-[4.5rem] max-xl:mt-[3rem] w-full h-[500px] max-xl:h-[350px] max-sm:h-[250px] relative z-50">
        <div class="absolute inset-0 z-50 flex flex-col justify-center items-center gap-y-4 max-sm:gap-y-2 px-4">
            <p class="text-white text-6xl max-xl:text-3xl  font-bold text-center" data-aos="zoom-in"
                data-aos-duration="3000">
                การลงทะเบียน
            </p>
        </div>

        <img src="/images/banner/image1.png" alt="" class="w-full h-full absolute object-cover">
    </section>
    <section class="flex flex-col justify-center gap-4 py-10 bg-white relative">

        <div class="w-[60%] mx-auto flex flex-col justify-center gap-12  items-center">
            @foreach ($regisPost as $post)
                <a href="{{ url('register/detail/'.$post->id) }}" target="_blank"
                    class=" z-50 flex justify-between bg-[#F7FAF3]  border border-[#F7FAF3] rounded-2xl shadow-md max-sm:flex-col " data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom" data-aos-duration="3000">
                    <div class="flex flex-col gap-4 p-6 items-start justify-center w-[70%] max-sm:order-2">
                        <p class="text-[#23404A] font-bold text-start text-2xl max-md:text-xl ">{{$post->title}}</p>
                        <p class="text-[#686868] text-start text-xl max-lg:text-lg max-sm:text-[1rem]">{{$post->description}}</p>
                    </div>
                    <div class="rounded-2xl w-[550px] h-[300px] max-sm:w-[350px] max-sm:h-[250px] shadow-md">
                        <img src="{{url($post->thumbnail_link)}}" alt=""
                            class="w-full h-full rounded-2xl object-cover shadow-md">
                    </div>
                </a>
            @endforeach
        </div>

        <img src="/images/home/Group 439.png" alt="" class="w-full h-full top-0 absolute object-cover">


    </section>




    <section class="relative bg-[#F4FCFF] flex flex-col gap-4 Z-50 pb-4">
        <p class="text-[#23404A] font-bold text-center text-4xl max-md:text-2xl z-50 max-md:px-2 pt-16 max-sm:pt-8"
            data-aos="zoom-in" data-aos-duration="3000">
            ที่พัก เส้นทาง และผังจัดงาน
        </p>
        <div class="mt-4 shadow-md w-full h-[450px] max-md:h-[300px] max-sm:h-[200px]">
            <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3826.908230602374!2d102.82955227514358!3d16.429486484303464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31228a230449c587%3A0xc4b5ba4aaf738f68!2z4LmC4Lij4LiH4LmB4Lij4Lih4LmC4LiG4Lip4LiwIOC4guC4reC4meC5geC4geC5iOC4mSBLT1NBIEhPVEVMIEtIT05LQUVO!5e0!3m2!1sth!2sth!4v1726822460127!5m2!1sth!2sth"
            class="w-full h-full outline-none" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

@endsection
@section('script')
@endsection
