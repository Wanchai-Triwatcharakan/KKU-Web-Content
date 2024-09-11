<nav class="bg-white border-b shadow-sm border-gray-200 w-full fixed top-0 z-[99]">
    <div class="max-w-screen-2xl flex items-center justify-between mx-auto ">
        <a href="{{ url('/') }}" class="flex items-center">
            <img src="{{ url($webInfo->detail->image_1->link) }}" class="h-12" alt="kku Logo" />
        </a>
        {{-- @dd($webInfo->detail->favicon) --}}
        <button data-collapse-toggle="navbar-dropdown" type="button"
            class="inline-flex items-center p-2 w-14 h-10 justify-center xl:hidden"
            aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="ham hamRotate ham1" viewBox="0 0 100 100" width="80" onclick="this.classList.toggle('active')">
                <path
                      class="line top"
                      d="m 30,33 h 40 c 0,0 9.044436,-0.654587 9.044436,-8.508902 0,-7.854315 -8.024349,-11.958003 -14.89975,-10.85914 -6.875401,1.098863 -13.637059,4.171617 -13.637059,16.368042 v 40" />
                <path
                      class="line middle"
                      d="m 30,50 h 40" />
                <path
                      class="line bottom"
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
                {{-- <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                        class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">Dropdown
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar"
                        class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                        <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 ">Dashboard</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 ">Settings</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 ">Earnings</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Sign
                                out</a>
                        </div>
                    </div>
                </li> --}}
                {{-- <li>
                    <a href="/news"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">News</a>
                </li>
                <li>
                    <a href="/aboutus"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">About us</a>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>
