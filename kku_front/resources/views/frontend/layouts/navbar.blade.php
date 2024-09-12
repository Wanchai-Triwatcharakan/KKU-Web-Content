<nav class="bg-white border-b shadow-sm border-gray-200 w-full fixed top-0 z-[99] max-md:px-2">
    <div class="max-w-screen-2xl flex items-center justify-between mx-auto ">
        <a href="{{ url('/') }}" class="flex items-center">
            <img src="{{ url($webInfo->detail->image_1->link) }}" class="h-12" alt="kku Logo" />
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
                class="flex flex-col w-full font-semibold text-center  border border-gray-100 rounded-lg bg-gray-50 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                @foreach ($main_cate as $cate)
                    <li>
                        <a href="{{ url($cate->cate_url) }}"
                            class=" block py-6 px-3 text-[1rem] font-semibold text-center text-[#23404A] min-w-[135px] hover:text-white hover:bg-[#FF864E] 
                        {{ request()->is($cate->cate_url) ? 'bg-[#B8D88F] text-white' : '' }} "
                            aria-current="page">{{ $cate->cate_title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="m-nav w-[40%] max-md:w-[60%] absolute bg-white h-[100vh] shadow-md right-0 ">
        <ul>
            @foreach ($main_cate as $cate)
                <li>
                    <a href="{{ url($cate->cate_url) }}"
                        class=" block py-4 px-3 text-[1.2rem] font-medium text-strat text-[#23404A] min-w-[135px] hover:text-white hover:bg-[#FF864E] 
                {{ request()->is($cate->cate_url) ? 'bg-[#B8D88F] text-white' : '' }} "
                        aria-current="page">{{ $cate->cate_title }}</a>
                </li>
                <hr>
            @endforeach
        </ul>
    </div>
</nav>

@vite('resources/js/navbarM.js')
