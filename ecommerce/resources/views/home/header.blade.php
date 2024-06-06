<header class="header w-full">
    <!--! topHeader -->
    <div class="top-header w-screen flex flex-col items-center justify-between border-b">
        <div class="flex w-full items-center justify-between p-4 md:px-20 border-b">
            <div class="icons hidden lg:flex items-center gap-2">
                <a class="text-gray-700 bg-gray-300/50 p-1 rounded-md hover:scale-110 hover:text-white hover:bg-red-400 flex items-center justify-center transition-all" href="#">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a>
                <a class="text-gray-700 bg-gray-300/50 p-1 rounded-md hover:scale-110 hover:text-white hover:bg-red-400 flex items-center justify-center transition-all" href="#">
                    <ion-icon name="logo-linkedin"></ion-icon>
                </a>
                <a class="text-gray-700 bg-gray-300/50 p-1 rounded-md hover:scale-110 hover:text-white hover:bg-red-400 flex items-center justify-center transition-all" href="#">
                    <ion-icon name="logo-github"></ion-icon>
                </a>
            </div>
            <h3 class="text-gray-400 font-semibold text-xs">
                FREE SHIPPING THIS WEEK ORDER OVER - $55
            </h3>
            <div class="select hidden md:flex">
                <select class="mr-2 p-1 px-2 text-sm font-semibold" id="currency">
                    <option value="USD">USD $</option>
                    <option value="EUR">EUR €</option>
                </select>
                <select class="mr-2 p-1 px-2 text-sm font-semibold" id="language">
                    <option value="Persian">English</option>
                    <option value="English">Persian</option>
                </select>
            </div>
        </div>

        <!-- topbar -->

        <div class="gap-4 flex flex-col sm:flex-row w-full items-center justify-between p-6 md:px-24">
            <h1 class="font-semibold text-4xl text-gray-600">MOTOfix</h1>
            <form class="relative w-full sm:w-3/5">
                <input class="w-full h-full p-2 border rounded-xl" placeholder="Enter Your Product Name..." id="search" type="text" />
                <label class="absolute right-2 top-2" for="search">
                    <i class="fa-solid fa-magnifying-glass cursor-pointer"></i>
                </label>
            </form>
            <div class="icons hidden mr-2 text-3xl md:flex gap-8 text-gray-600">

                @if (Route::has('login'))

                @auth

                <div class="relative">
                    <ion-icon name="person-outline"></ion-icon>
                </div>

                <div class="relative">
                    <span class="text-xs text-center font-semibold text-white absolute -top-2 -right-2 w-4 h-4 bg-red-400 rounded-full">{{$count}}</span>
                    <a href="{{url('mycart')}}"><ion-icon name="cart-outline"></ion-icon></a>
                </div>

                <div class="relative">
                    <span class="text-xs text-center font-semibold text-white absolute -top-2 -right-2 w-4 h-4 bg-red-400 rounded-full">{{$orderCount}}</span>
                    <a href="{{url('myorders')}}"><ion-icon name="bag-handle-outline"></ion-icon></a>
                </div>

                <div class="relative">
                    <form id="logout-form" method="POST" action="{{ route('logout') }}">

                        @csrf

                        <button id="logout" type="submit"><ion-icon name="log-out-outline"></ion-icon></button>
                    </form>
                </div>

                @else

                <div class="relative">
                    <a href="{{url('/login')}}"><ion-icon name="person-outline"></ion-icon></a>
                </div>

                @endauth

                @endif
            </div>
        </div>

        <!-- topbar -->

    </div>
    <!--! topHeader -->

    <!--? navbar -->
    <!-- desktop Navbar -->
    <div class="desktopNavbar">
        <nav class="my-4 hidden lg:flex justify-center">
            <ul class="desktopNavbarUl flex justify-center items-center gap-12 font-sm font-bold text-gray-600">
                <li class="nav_items relative">
                    <a class="{{ request()->is('/') ? 'active' : 'desktopNavbar a:hover' }}" href="{{url('/')}}">HOME</a>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-400 transition-all ease-in-out"></span>
                </li>
                <li class="nav_items relative perfume_nav_item">
                    <a href="">CATEGORIES</a>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-400 transition-all ease-in-out"></span>
                    <!--? hoverItems -->
                    <ul class="hoveredItems w-52 absolute top-10 hidden flex-col items-start justify-start gap-2 p-4 rounded-xl shadow-lg border font-normal bg-white">

                        @foreach($category as $category)

                        <li>
                            <a href="{{ route('category.filter', $category->category_name) }}">{{$category->category_name}}</a>
                        </li>

                        @endforeach

                    </ul>
                    <!--? hoverItems -->
                </li>
                <li class="nav_items relative">
                    <a class="{{ request()->is('all') ? 'active' : 'desktopNavbar a:hover' }}" href="{{url('all')}}">ALL</a>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-red-400 transition-all ease-in-out"></span>
                </li>
            </ul>
        </nav>
    </div>

    <!--? mobile Navbar -->
    <div class="mobileNavbar">
        <!--? navbar button -->
        <div style="box-shadow: 0 0 0.3rem lightgray" class="z-10 bg-white w-96 lg:hidden flex justify-around items-center p-4 border rounded-t-xl fixed bottom-0 left-1/2 -translate-x-1/2 text-lg">
            <button id="openNavbarButton" type="button">
                <ion-icon name="menu-outline"></ion-icon>
            </button>

            <button class="relative" type="button">
                <span class="text-xs text-center font-semibold text-white absolute -top-2 -right-2 w-4 h-4 bg-red-400 rounded-full">
                    0
                </span>
                <ion-icon name="bag-handle-outline"></ion-icon>
            </button>

            <button type="button">
                <ion-icon name="home-outline"></ion-icon>
            </button>

            <button id="categoriesBtn" type="button">
                <ion-icon name="grid-outline"></ion-icon>
            </button>
        </div>
        <!--* overlay -->
        <div id="overlayNavbar" class="hidden fixed top-0 left-0 w-screen h-screen bg-gray-500/30 z-10"></div>

        <!--! sidebarNavbar -->
        <div class="fixed top-0 w-72 h-screen bg-white p-4 shadow-lg hidden flex-col justify-start gap-4 text-lg font-semibold overflow-auto z-20" id="sidebarNavbar">
            <div class="flex justify-between border-b-2 py-4">
                <h3 class="text-red-400">Menu</h3>
                <button class="closeButton hover:text-red-500">
                    <ion-icon name="close-circle-outline"></ion-icon>
                </button>
            </div>
            <div class="mobile_navbar_item border-b pb-3 text-gray-600">
                Home
            </div>
            <div class="mobile_navbar_item border-b pb-3 text-gray-600">
                <details>
                    <a href="#">Shirt</a>
                    <a href="#">Shorts & Jeans</a>
                    <a href="#">Safety Shoes</a>
                    <a href="#">Wallet</a>
                    <summary>Men's</summary>
                </details>
            </div>
            <div class="mobile_navbar_item border-b pb-3 text-gray-600">
                <details>
                    <a href="#">Dress & Frock</a>
                    <a href="#">Earrings</a>
                    <a href="#">Necklace</a>
                    <a href="#">Makeup Kit</a>
                    <summary>Women's</summary>
                </details>
            </div>
            <div class="mobile_navbar_item border-b pb-3 text-gray-600">
                <details>
                    <a href="#">Earrings</a>
                    <a href="#">Couple Rings</a>
                    <a href="#">Necklace</a>
                    <a href="#">Bracelets</a>
                    <summary>Jewelry</summary>
                </details>
            </div>
            <div class="mobile_navbar_item border-b pb-3 text-gray-600">
                <details>
                    <a href="#">Clothes Perfume</a>
                    <a href="#">Deodorant</a>
                    <a href="#">Flower Fragrance</a>
                    <a href="#">Air Freshener</a>
                    <summary>Perfume</summary>
                </details>
            </div>
            <div class="mobile_navbar_item border-b pb-3 text-gray-600">
                <a href="#">Blog</a>
            </div>
            <div class="mobile_navbar_item border-b pb-3 text-gray-600">
                <a href="#">Hot Offers</a>
            </div>

            <div class="mobile_navbar_item border-b pb-3 text-gray-600">
                <details>
                    <div class="border rounded-xl shadow-xl flex flex-col items-start">
                        <a class="border-b w-full pb-2" href="#">English</a>
                        <a class="border-b w-full pb-2" href="#">Persian</a>
                    </div>
                    <summary>Language</summary>
                </details>
            </div>
            <div class="mobile_navbar_item border-b pb-3 text-gray-600">
                <details>
                    <div class="border rounded-xl shadow-xl flex flex-col items-start">
                        <a class="border-b w-full pb-2" href="#">USD $</a>
                        <a class="border-b w-full pb-2" href="#">EUR €</a>
                    </div>
                    <summary>Currency</summary>
                </details>
            </div>

            <div class="icons flex items-center justify-center gap-4">
                <a class="text-gray-900 bg-gray-300/50 p-2 rounded-md hover:scale-110 hover:text-white hover:bg-red-400 flex items-center justify-center" href="#">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a>
                <a class="text-gray-900 bg-gray-300/50 p-2 rounded-md hover:scale-110 hover:text-white hover:bg-red-400 flex items-center justify-center" href="#">
                    <ion-icon name="logo-linkedin"></ion-icon>
                </a>
                <a class="text-gray-900 bg-gray-300/50 p-2 rounded-md hover:scale-110 hover:text-white hover:bg-red-400 flex items-center justify-center" href="#">
                    <ion-icon name="logo-github"></ion-icon>
                </a>
            </div>
        </div>

        <!-- sidebarCategories -->
        <div id="sidebarCategories" class="fixed top-0 w-80 h-screen bg-white p-6 shadow-lg hidden flex-col justify-start gap-4 font-semibold overflow-auto z-20">
            <div class="categories w-full h-auto">
                <div class="w-full flex items-center justify-between">
                    <h1 class="text-lg font-semibold mb-4">CATEGORY</h1>
                    <button class="closeButton text-xl hover:text-red-500">
                        <ion-icon name="close-circle-outline"></ion-icon>
                    </button>
                </div>
                <div class="border-b pb-3 text-lg text-gray-600">
                    <details>
                        <div class="flex justify-between items-baseline text-sm">
                            <a href="#">Shirt</a>
                            <span>300</span>
                        </div>
                        <div class="flex justify-between items-baseline text-sm">
                            <a href="#">Shorts & Jeans</a>
                            <span>30</span>
                        </div>
                        <div class="flex justify-between items-baseline text-sm">
                            <a href="#">Jacket</a>
                            <span>50</span>
                        </div>
                        <div class="flex justify-between items-baseline text-sm">
                            <a href="#">Dress & Frock</a>
                            <span>120</span>
                        </div>
                        <summary>
                            <div class="flex items-center gap-2">
                                Clothes
                                <img class="w-4 h-4" src="{{asset('home/assets/images/icons/dress.svg')}}" alt="productPicture" />
                            </div>
                        </summary>
                    </details>
                </div>
                <div class="border-b pb-3 text-lg text-gray-600">
                    <details>
                        <div class="flex justify-between items-baseline text-sm">
                            <a href="#">Sports</a>
                            <span>300</span>
                        </div>
                        <div class="flex justify-between items-baseline text-sm">
                            <a href="#">Formal</a>
                            <span>30</span>
                        </div>
                        <div class="flex justify-between items-baseline text-sm">
                            <a href="#">Casual</a>
                            <span>50</span>
                        </div>
                        <div class="flex justify-between items-baseline text-sm">
                            <a href="#">Safety Shoes</a>
                            <span>120</span>
                        </div>
                        <summary>
                            <div class="flex items-center gap-2">
                                Footwear
                                <img class="w-4 h-4" src="{{asset('home/assets/images/icons/shoes.svg')}}" alt="productPicture" />
                            </div>
                        </summary>
                    </details>
                </div>
                <div class="border-b pb-3 text-lg text-gray-600">
                    <details>
                        <div class="flex justify-between items-baseline text-sm">
                            <a href="#">Earrings</a>
                            <span>300</span>
                        </div>
                        <div class="flex justify-between items-baseline text-sm">
                            <a href="#">Couple Rings</a>
                            <span>30</span>
                        </div>
                        <div class="flex justify-between items-baseline text-sm">
                            <a href="#">Necklace</a>
                            <span>50</span>
                        </div>
                        <summary>
                            <div class="flex items-center gap-2">
                                Jewelry
                                <img class="w-4 h-4" src="{{asset('home/assets/images/icons/jewelry.svg')}}" alt="productPicture" />
                            </div>
                        </summary>
                    </details>
                </div>
                <div class="border-b pb-3 text-lg text-gray-600">
                    <details>
                        <div class="flex justify-between items-baseline text-sm">
                            <a href="#">Clothes Perfume</a>
                            <span>300</span>
                        </div>
                        <div class="flex justify-between items-baseline text-sm">
                            <a href="#">Deodorant</a>
                            <span>30</span>
                        </div>
                        <div class="flex justify-between items-baseline text-sm">
                            <a href="#">Jacket</a>
                            <span>50</span>
                        </div>
                        <div class="flex justify-between items-baseline text-sm">
                            <a href="#">Dress & Frock</a>
                            <span>120</span>
                        </div>
                        <summary>
                            <div class="flex items-center gap-2">
                                Perfume
                                <img class="w-4 h-4" src="{{asset('home/assets/images/icons/perfume.svg')}}" alt="productPicture" />
                            </div>
                        </summary>
                    </details>
                </div>
                <div class="border-b pb-3 text-lg text-gray-600">
                    <details>
                        <div class="flex justify-between items-baseline text-sm">
                            <a href="#">Shampoo</a>
                            <span>300</span>
                        </div>
                        <div class="flex justify-between items-baseline text-sm">
                            <a href="#">Sunscreen</a>
                            <span>30</span>
                        </div>
                        <div class="flex justify-between items-baseline text-sm">
                            <a href="#">Body Wash</a>
                            <span>50</span>
                        </div>
                        <div class="flex justify-between items-baseline text-sm">
                            <a href="#">Makeup Kit</a>
                            <span>120</span>
                        </div>
                        <summary>
                            <div class="flex items-center gap-2">
                                Cosmetics
                                <img class="w-4 h-4" src="{{asset('home/assets/images/icons/cosmetics.svg')}}" alt="productPicture" />
                            </div>
                        </summary>
                    </details>
                </div>
                <div class="border-b pb-3 text-lg text-gray-600">
                    <details>
                        <div class="flex justify-between items-baseline text-sm">
                            <a href="#">Sunglasses</a>
                            <span>23</span>
                        </div>
                        <div class="flex justify-between items-baseline text-sm">
                            <a href="#">Lenses</a>
                            <span>53</span>
                        </div>
                        <summary>
                            <div class="flex items-center gap-2">
                                Glasses
                                <img class="w-4 h-4" src="{{asset('home/assets/images/icons/glasses.svg')}}" alt="productPicture" />
                            </div>
                        </summary>
                    </details>
                </div>
                <div class="border-b pb-3 text-lg text-gray-600">
                    <details>
                        <div class="flex justify-between items-baseline text-sm">
                            <a href="#">Wallet</a>
                            <span>300</span>
                        </div>
                        <div class="flex justify-between items-baseline text-sm">
                            <a href="#">Purse</a>
                            <span>30</span>
                        </div>
                        <div class="flex justify-between items-baseline text-sm">
                            <a href="#">Gym Backpack</a>
                            <span>50</span>
                        </div>
                        <div class="flex justify-between items-baseline text-sm">
                            <a href="#">Shopping Bag</a>
                            <span>120</span>
                        </div>
                        <summary>
                            <div class="flex items-center gap-2">
                                Bags
                                <img class="w-4 h-4" src="{{asset('home/assets/images/icons/bag.svg')}}" alt="productPicture" />
                            </div>
                        </summary>
                    </details>
                </div>
            </div>

            <div class="bestsellers w-full h-auto mt-2 flex flex-col items-start justify-start gap-4">
                <h2 class="text-lg font-semibold">BEST SELLERS</h2>
                <div class="flex items-center justify-start gap-2">
                    <div class="w-20 h-20 p-2 border shadow-lg bg-gray-300/20 rounded-md">
                        <img class="w-full h-full" src="{{asset('home/assets/images/products/1.jpg')}}" alt="" />
                    </div>
                    <div class="text-gray-700">
                        <h4 class="text-gray-900">Baby Fabric Shoes</h4>
                        <div class="stars text-yellow-500">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star-half-outline"></ion-icon>
                        </div>
                        <div class="flex items-center justify-start gap-4">
                            <s class="text-gray-500">$14.00</s>
                            <strong>$7.00</strong>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-start gap-2">
                    <div class="w-20 h-20 p-2 border shadow-lg bg-gray-300/20 rounded-md">
                        <img class="w-full h-full" src="{{asset('home/assets/images/products/2.jpg')}}" alt="" />
                    </div>
                    <div class="text-gray-700">
                        <h4 class="text-gray-900">
                            Men's Hoodies T-Shirt
                        </h4>
                        <div class="stars text-yellow-500">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star-half-outline"></ion-icon>
                            <ion-icon name="star-outline"></ion-icon>
                        </div>
                        <div class="flex items-center justify-start gap-4">
                            <s class="text-gray-500">$5.00</s>
                            <strong>$2.00</strong>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-start gap-2">
                    <div class="w-20 h-20 p-2 border shadow-lg bg-gray-300/20 rounded-md">
                        <img class="w-full h-full" src="{{asset('home/assets/images/products/3.jpg')}}" alt="" />
                    </div>
                    <div class="text-gray-700">
                        <h4 class="text-gray-900">Girls T-Shirt</h4>
                        <div class="stars text-yellow-500">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star-half-outline"></ion-icon>
                            <ion-icon name="star-outline"></ion-icon>
                            <ion-icon name="star-outline"></ion-icon>
                        </div>
                        <div class="flex items-center justify-start gap-4">
                            <s class="text-gray-500">$10.00</s>
                            <strong>$5.00</strong>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-start gap-2">
                    <div class="w-20 h-20 p-2 border shadow-lg bg-gray-300/20 rounded-md">
                        <img class="w-full h-full" src="{{asset('home/assets/images/products/4.jpg')}}" alt="" />
                    </div>
                    <div class="text-gray-700">
                        <h4 class="text-gray-900">
                            Woolen Hat For Men
                        </h4>
                        <div class="stars text-yellow-500">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star-half-outline"></ion-icon>
                        </div>
                        <div class="flex items-center justify-start gap-4">
                            <s class="text-gray-500">$24.00</s>
                            <strong>$17.00</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--? Navbar -->
</header>