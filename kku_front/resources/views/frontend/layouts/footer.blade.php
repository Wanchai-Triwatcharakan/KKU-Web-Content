<footer>
    {{-- <div class="body-load">
        <svg class="spinner" width="150px" height="150px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
            <circle class="path" fill="none" stroke-width="4" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
        </svg>
    </div> --}}
    {{-- <div class="column-footer">
        <div class="column grid-item1"> --}}
    {{-- <img src="/images/logo.png" alt=""> --}}
    <!-- will open when production -->
    {{-- <img src="/{{ $web_info->detail->image_1->link }}" alt="{{ $web_info->detail->image_1->value }}">
            <small>{{$web_info->footer->copy_right->value}}</small> --}}
    {{-- </div> --}}
    {{-- <div class="column">
            <h2>{{$web_info->footer->footer_menu->description}}</h2>
            <ul>
                @foreach ($website['footer_menu'] as $menu)
                    <li><a href="{{$menu->cate_url}}">{{$menu->cate_title}}</a></li>
                @endforeach
            </ul>
        </div> --}}
    {{-- <div class="column">
            <h2>{{$web_info->footer->footer_more_info->description}}</h2>
            <ul>
                @foreach ($website['footer_menuinfo'] as $menu)
                    <li><a href="{{$menu->cate_url}}">{{$menu->cate_title}}</a></li>
                @endforeach
            </ul>
        </div> --}}
    {{-- <div class="column">
            <h2>{{$web_info->footer->footer_term_privacy->description}}</h2>
            <ul> --}}
    {{-- <li><a href="{{$web_info->footer->terms_of_service->link}}" target="_blank">Terms of Service</a></li> --}}
    {{-- <li><a href="{{$web_info->footer->privacy_policy->link}}" target="_blank">Privacy Policy</a></li>
            </ul>
        </div>
        <div class="column">
            <h2>{{$web_info->footer->footer_social->description}}</h2>
            <div class="column-social">
                <a href="{{$web_info->contact->link_facebook->link}}" target="_blank"><i class="fa-brands fa-square-facebook"></i></a>
                <a href="{{$web_info->contact->link_instagram->link}}" target="_blank"><i class="fa-brands fa-square-instagram"></i></i></a> --}}
    {{-- <a href="{{$web_info->contact->link_twitter->link}}" target="_blank"><i class="fa-brands fa-square-twitter"></i></a> --}}
    {{-- </div>
        </div>
    </div>
    <div class="column-footer-bottom">
        <small>{{$web_info->footer->copy_right->value}}</small>
    </div>
</footer>
<script>
    const language = window.location.pathname.split('/')[1]
    localStorage.setItem('language', language);
</script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="/js/navbar.js"></script>
<script src="/js/popup.js"></script> --}}


    <footer class="">
        <div class="bg-gradient-to-r from-[#8DD7FA] to-[#B8D88F] py-4">
            <div class="w-4/5 max-yy:w-full mx-auto items-center px-4">
                <div class="flex w-full max-xl:flex-col gap-2">
                    <div class="flex justify-start items-center">
                        {{-- <div class="w-[150px] h-[90px]"> --}}
                        <img src="images/home/LOGO-new.png" alt="" class="">
                        {{-- </div> --}}
                        <div class="flex flex-col">
                            <p class="text-xl text-white text-wrap">First Conference and Exhibition on Health
                                and Wellness Innovation</p>
                            <p class="text-md text-white">“Empowering Invention to Innovation for Quality of Life” </p>
                        </div>
                    </div>
                    <div class="w-full items-center hidden sm:block">
                        <ul role="list" class="marker:text-white list-disc pl-5 space-y-3 text-white text-[1rem]">
                            <div class="flex justify-between">
                                <div class="">
                                    <li>ข้อมูลสัมมนา</li>
                                    <div class="pl-4">
                                        <li>ที่มา</li>
                                        <li>วิทยากร</li>
                                    </div>
                                </div>
                                <li>ลงทะเบียน</li>
                                <li>กำหนดการ</li>
                                <li>ข่าวสาร</li>
                                <li>ภาพบรรยากาศ</li>
                                <li>ที่พักเเละเส้นทาง</li>
                                <li>ติดต่อเรา</li>
                            </div>
                        </ul>
                    </div>
                    {{-- <div class="sm:hidden">
                       
                    </div> --}}

                </div>
            </div>
        </div>
        </div>
        <div class="bg-[#8DD7FA] py-2">
            <div
                class=" w-4/5 max-yy:w-full mx-auto flex justify-end max-lg:justify-start gap-2 items-center px-4 max-sm:items-start">
                <div class="w-6 h-6 max-sm:w-10 max-sm:h-6">
                    <img src="images/home/line.png" alt="" class="w-full h-full">
                </div>
                <p class="text-white text-lg max-xl:text-[1rem] max-sm:text-[1rem]">: 085-001-6805
                    ที่อยู่ 123 ถนนมิตรภาพ ตำบลในเมือง อำเภอเมือง จังหวัดขอนแก่น จ.ขอนแก่น 40000</p>
            </div>
        </div>

    </footer>
