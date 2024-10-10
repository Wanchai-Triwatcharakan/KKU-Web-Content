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


    <footer class="z-50 relative">
        <div class="bg-gradient-to-r from-[#8DD7FA] to-[#B8D88F] py-4 ">
            <div class="w-4/5 max-yy:w-full mx-auto items-center px-4">
                <div class="flex w-full max-xl:flex-col gap-4">
                    <div class="flex justify-start items-center gap-4 ">
                        {{-- <div class="w-[150px] h-[90px]"> --}}
                        <img src="/images/home/LOGO-new.png" alt="" class="">
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
                                @foreach ($main_cate as $main )
                                    @if (!$main->cate_parent_id && $main->is_bottomside == true)
                                        <div class="flex flex-col">
                                            <a href="{{ url($main->cate_url) }}" id="main-{{ $main->id }}" class="relative text-white hover:text-white cursor-pointer transition-all ease-in-out before:transition-[width] before:ease-in-out before:duration-700 before:absolute before:bg-white before:origin-center before:h-[1px] before:w-0 hover:before:w-[50%] before:bottom-0 before:left-[50%] after:transition-[width] after:ease-in-out after:duration-700 after:absolute after:bg-white after:origin-center after:h-[1px] after:w-0 hover:after:w-[50%] after:bottom-0 after:right-[50%]  {{ request()->is($main->cate_url) ? 'underline underline-offset-4' : '' }}">
                                                {{ $main->cate_title }}</a>
                                            @php
                                                $hasSubMenu = $main_cate
                                                    ->where('cate_parent_id', $main->id)
                                                    ->isNotEmpty();
                                            @endphp
                                            @if ($hasSubMenu)
                                                @php
                                                    $subMenus = $main_cate->where('cate_parent_id', $main->id);
                                                @endphp
                                                @foreach ($subMenus as $sub_cate)
                                                    <div class="pl-2">
                                                        <a href="{{ url($sub_cate->cate_url) }}" class="flex ">
                                                            <div class="w-6 h-6  hover:text-white">
                                                                <svg viewBox="0 0 15 15"
                                                                    class="flex-shrink-0 w-full h-full text-white transition duration-75 group-hover:text-white"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                        stroke-linejoin="round"></g>
                                                                    <g id="SVGRepo_iconCarrier">
                                                                        <path
                                                                            d="M9.875 7.5C9.875 8.81168 8.81168 9.875 7.5 9.875C6.18832 9.875 5.125 8.81168 5.125 7.5C5.125 6.18832 6.18832 5.125 7.5 5.125C8.81168 5.125 9.875 6.18832 9.875 7.5Z"
                                                                            class="fill-current"></path>
                                                                    </g>
                                                                </svg>
                                                            </div>
                                                            <span class="relative text-white hover:text-white cursor-pointer transition-all ease-in-out before:transition-[width] before:ease-in-out before:duration-700 before:absolute before:bg-white before:origin-center before:h-[1px] before:w-0 hover:before:w-[50%] before:bottom-0 before:left-[50%] after:transition-[width] after:ease-in-out after:duration-700 after:absolute after:bg-white after:origin-center after:h-[1px] after:w-0 hover:after:w-[50%] after:bottom-0 after:right-[50%] {{ request()->is($sub_cate->cate_url) ? 'underline underline-offset-4' : '' }}">{{ $sub_cate->cate_title }}</span>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="bg-[#8DD7FA] py-2">
            <div
                class=" w-4/5 max-yy:w-full mx-auto flex justify-end max-lg:justify-start gap-2 items-center px-4 max-sm:items-start">
                <div class="w-6 h-6 max-sm:w-10 max-sm:h-6">
                    <img src="/images/home/line.png" alt="" class="w-full h-full">
                </div>
                <p class="text-white text-lg max-xl:text-[1rem] max-sm:text-[1rem]">: {{$webInfo->contact->phone->value}}
                    {{$webInfo->location->address->value}} {{$webInfo->location->subdistrict->value}} {{$webInfo->location->district->value}} {{$webInfo->location->province->value}} {{$webInfo->location->zipcode->value}}</p>
            </div>
        </div>
    </footer>