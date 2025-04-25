<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url('public/css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">

</head>

<body class="container">

    <!-- navbar -->
    <div class="bg-white">
        <header class="absolute inset-x-0 top-0 z-50 container
        ">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto"
                            src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="">
                    </a>
                </div>
                <div class="flex lg:hidden">
                    <button type="button"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Open main menu</span>
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                @guest


                @else
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="{{ route('home') }}" class="text-sm/6 font-semibold text-gray-900">Home</a>
                    <a href="{{ route('product.index') }}" class="text-sm/6 font-semibold text-gray-900">Product</a>
                    <a href="#" class="text-sm/6 font-semibold text-gray-900">Marketplace</a>
                    <a href="#" class="text-sm/6 font-semibold text-gray-900">Company</a>
                </div>

                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <p class="flex">{{ ucfirst(trans (Auth::user()->name)) }} &nbsp; &nbsp;
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                            class="text-sm font-semibold text-gray-900"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="#000000" viewBox="0 0 256 256">
                                <path
                                    d="M120,216a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V40a8,8,0,0,1,8-8h64a8,8,0,0,1,0,16H56V208h56A8,8,0,0,1,120,216Zm109.66-93.66-40-40a8,8,0,0,0-11.32,11.32L204.69,120H112a8,8,0,0,0,0,16h92.69l-26.35,26.34a8,8,0,0,0,11.32,11.32l40-40A8,8,0,0,0,229.66,122.34Z">
                                </path>
                            </svg></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </p>
                </div>

                @endguest

                @guest

                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="text-sm/6 font-semibold text-gray-900"> Log in &nbsp;</a>
                    @endif
                    |
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-sm/6 font-semibold text-gray-900">&nbsp; Register </a>
                    @endif
                </div>

                @endguest


            </nav>

        </header>
        <!-- navbar -->


        <div class="h-screen pt-28 container">
            {{ $slot }}
        </div>




        <footer class="bg-white rounded-lg shadow-sm m-4 dark:bg-gray-800">
            <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a
                        href="https://flowbite.com/" class="hover:underline">Crud</a>. All Rights Reserved.
                </span>
                <ul
                    class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">About</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
        </footer>


</body>

</html>