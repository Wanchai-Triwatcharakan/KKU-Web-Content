<nav class="bg-white border-b shadow-sm border-gray-200 w-full fixed top-0 z-[99] px-4 max-md:px-2">

    <div class="max-w-screen-2xl flex items-center justify-between mx-auto ">
        <a href="{{ url('/') }}" class="flex items-center">
            <img src="{{ url($webInfo->detail->image_1->link) }}" class="h-[3.7rem]" alt="kku Logo" />
        </a>
        {{-- @dd($webInfo->detail->favicon) --}}
        <button data-collapse-toggle="navbar-dropdown" type="button"
            class="mobile-menu-button inline-flex items-center py-2 w-12 h-10 justify-center xl:hidden"
            aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="ham hamRotate ham1" viewBox="0 0 100 100" width="80"
                onclick="this.classList.toggle('active')">
                <path class="line top"
                    d="m 30,33 h 40 c 0,0 9.044436,-0.654587 9.044436,-8.508902 0,-7.854315 -8.024349,-11.958003 -14.89975,-10.85914 -6.875401,1.098863 -13.637059,4.171617 -13.637059,16.368042 v 40" />
                <path class="line middle" d="m 30,50 h 40" />
                <path class="line bottom"
                    d="m 30,67 h 40 c 12.796276,0 15.357889,-11.717785 15.357889,-26.851538 0,-15.133752 -4.786586,-27.274118 -16.667516,-27.274118 -11.88093,0 -18.499247,6.994427 -18.435284,17.125656 l 0.252538,40" />
            </svg>
        </button>
        <div class="hidden w-full xl:block xl:w-auto" id="navbar-dropdown">
            <ul
                class="flex flex-col w-full font-semibold text-center border border-gray-100 rounded-lg bg-gray-50 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                @foreach ($main_cate as $main)
                    @if (!$main->cate_parent_id)
                        <li class="relative">
                            <a href="{{ url($main->cate_url) }}" id="main-{{ $main->id }}"
                                class="block flex justify-center items-center py-6 px-3 text-[1.15rem] max-yi:text-[14px] font-[500] text-center text-[#23404A] h-full max-yi:min-w-[100px] min-w-[135px] hover:text-white hover:bg-[#FF864E] meunMain
                                {{ request()->is($main->cate_url) ? 'bg-[#B8D88F] text-white' : '' }}
                                {{ $main_cate->where('cate_parent_id', $main->id)->isNotEmpty() ? 'flex justify-between items-center gap-0 md:gap-4' : '' }} group">
                                {{ $main->cate_title }}
                                @php
                                    $hasSubMenu = $main_cate->where('cate_parent_id', $main->id)->isNotEmpty();
                                @endphp

                                @if ($hasSubMenu)
                                    <div class="w-6 h-6 svg">
                                        <svg fill="currentColor"
                                            class="flex-shrink-0 w-full h-full text-[#23404A] transition duration-75 transform group-hover:text-white "
                                            viewBox="0 0 14 14" role="img" focusable="false" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M 10.417496,5.828498 7.1954126,9.4082088 q -0.082507,0.091791 -0.195411,0.091791 -0.1129041,0 -0.1954109,-0.091791 L 3.582507,5.828498 Q 3.5,5.7367105 3.5,5.608691 3.5,5.480672 3.582507,5.388884 L 4.3033502,4.5917812 q 0.082507,-0.091781 0.1954109,-0.091781 0.1129042,0 0.1954108,0.091781 L 7.0000016,7.1570027 9.3058312,4.5917812 q 0.082507,-0.091781 0.1954112,-0.091781 0.1129042,0 0.1954108,0.091781 L 10.417496,5.388884 q 0.0825,0.091788 0.0825,0.219807 0,0.128019 -0.0825,0.219807 z">
                                                </path>
                                                <path
                                                    d="M 6.9999998,1 C 3.6862513,1 0.99999991,3.6862498 0.99999991,7.0000001 0.99999991,10.31375 3.6862513,13 6.9999998,13 10.313748,13 13,10.31375 13,7.0000001 13,3.6862498 10.313748,1 6.9999998,1 z m 0,10.9 c -2.7061285,0 -4.8998742,-2.193875 -4.8998742,-4.8999999 0,-2.7061252 2.1937457,-4.9000004 4.8998742,-4.9000004 2.7062487,0 4.9000032,2.1938752 4.9000032,4.9000004 C 11.900003,9.706125 9.7062485,11.9 6.9999998,11.9 z">
                                                </path>
                                            </g>
                                        </svg>
                                    </div>
                                @endif
                            </a>


                            @php
                                // ตรวจสอบว่ามีเมนูย่อยหรือไม่
                                $hasSubMenu = $main_cate->where('cate_parent_id', $main->id)->isNotEmpty();
                            @endphp


                            {{-- sub menu --}}
                            @if ($hasSubMenu)
                                @php
                                    $subMenus = $main_cate->where('cate_parent_id', $main->id);
                                    $lastSubMenu = $subMenus->last();
                                @endphp
                                <ul id="dropdown-{{ $main->id }}"
                                    class="absolute left-0 hidden bg-gray-50 border border-gray-100 w-full rounded-b-lg">
                                    @foreach ($subMenus as $sub_cate)
                                        <li>
                                            <a href="{{ url($sub_cate->cate_url) }}"
                                                class="block py-3 px-3 text-[1rem] font-normal text-start text-[#23404A] min-w-[135px] hover:text-white hover:bg-[#FF864E]
                                            {{ request()->is($sub_cate->cate_url) ? 'bg-[#B8D88F] text-white' : '' }}
                                            {{ $sub_cate->id === $lastSubMenu->id ? 'rounded-b-lg' : '' }}">
                                                {{ $sub_cate->cate_title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endif
                @endforeach
            </ul>


        </div>
    </div>

    <div class="m-nav w-[40%] max-md:w-[60%] absolute bg-white h-[100vh] shadow-md right-0">
        <ul>
            @foreach ($main_cate as $main)
                @if (!$main->cate_parent_id)
                    <li class="relative">
                        <a href="{{ url($main->cate_url) }}"
                            class="block py-4 px-3 text-[1.15rem] font-[500] text-strat text-[#23404A] min-w-[135px] hover:text-white hover:bg-[#FF864E] flex justify-between
                        {{ request()->is($main->cate_url) ? 'bg-[#B8D88F] text-white' : '' }} group">
                            {{ $main->cate_title }}
                            @php
                                $hasSubMenu = $main_cate->where('cate_parent_id', $main->id)->isNotEmpty();
                            @endphp
                            @if ($hasSubMenu)
                                <div class="w-8 h-8 svg">
                                    <svg fill="currentColor"
                                        class="flex-shrink-0 w-full h-full text-[#23404A] transition duration-75 transform group-hover:text-white"
                                        viewBox="0 0 14 14" role="img" focusable="false" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M 10.417496,5.828498 7.1954126,9.4082088 q -0.082507,0.091791 -0.195411,0.091791 -0.1129041,0 -0.1954109,-0.091791 L 3.582507,5.828498 Q 3.5,5.7367105 3.5,5.608691 3.5,5.480672 3.582507,5.388884 L 4.3033502,4.5917812 q 0.082507,-0.091781 0.1954109,-0.091781 0.1129042,0 0.1954108,0.091781 L 7.0000016,7.1570027 9.3058312,4.5917812 q 0.082507,-0.091781 0.1954112,-0.091781 0.1129042,0 0.1954108,0.091781 L 10.417496,5.388884 q 0.0825,0.091788 0.0825,0.219807 0,0.128019 -0.0825,0.219807 z">
                                            </path>
                                            <path
                                                d="M 6.9999998,1 C 3.6862513,1 0.99999991,3.6862498 0.99999991,7.0000001 0.99999991,10.31375 3.6862513,13 6.9999998,13 10.313748,13 13,10.31375 13,7.0000001 13,3.6862498 10.313748,1 6.9999998,1 z m 0,10.9 c -2.7061285,0 -4.8998742,-2.193875 -4.8998742,-4.8999999 0,-2.7061252 2.1937457,-4.9000004 4.8998742,-4.9000004 2.7062487,0 4.9000032,2.1938752 4.9000032,4.9000004 C 11.900003,9.706125 9.7062485,11.9 6.9999998,11.9 z">
                                            </path>
                                        </g>
                                    </svg>
                                </div>
                            @endif
                        </a>
                        @if ($hasSubMenu)
                            <ul class="submenu hidden">
                                @foreach ($main_cate as $sub_cate)
                                    @if ($sub_cate->cate_parent_id == $main->id)
                                        <li class="">
                                            <a href="{{ url($sub_cate->cate_url) }}"
                                                class="block py-3 px-3 text-[1rem] font-[500] text-[#23404A] min-w-[135px] hover:text-white hover:bg-[#FF864E] z-50 flex items-center justify-start
                                            {{ request()->is($sub_cate->cate_url) ? 'bg-[#B8D88F] text-white' : '' }} group">
                                                <div class="w-8 h-8 mr-4 hover:text-white  {{ request()->is($sub_cate->cate_url) ? 'text-white' : '' }}">
                                                    <svg viewBox="0 0 15 15"
                                                        class="flex-shrink-0 w-full h-full text-[#23404A] transition duration-75 group-hover:text-white"
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
                                                {{ $sub_cate->cate_title }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    </li>
                    <hr>
                @endif
            @endforeach
        </ul>
    </div>




</nav>

@vite('resources/js/navbarM.js')
