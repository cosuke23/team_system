<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        html {
            font-family: 'Inter', sans-serif;
        }

        .navbar-transition {
            transition: background-color 0.4s ease, box-shadow 0.4s ease;
        }
    </style>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        pcgblue: '#0033A0', // Philippine Coast Guard blue
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                },
            },
        };
    </script>
</head>

<body class="min-h-screen antialiased bg-gray-100">

    <!-- ✅ Navbar -->
    <nav id="navbar" class="fixed top-0 left-0 w-full z-50 bg-black navbar-transition">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="text-white text-xl font-bold">
                        Philippine Coast Guard
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">

                        @if(session('user_id'))
                            <!-- ✅ Show only Logout if logged in -->
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="bg-red-600 hover:bg-red-700 transition duration-300 text-white px-4 py-2 rounded-lg shadow-md text-sm font-semibold">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        @else
                            <!-- ✅ Show these only when NOT logged in -->
                            <a href="{{ route('home') }}"
                                class="px-3 py-2 rounded-md text-sm font-medium
                                {{ Route::is('home') ? 'bg-orange-600 text-white' : 'text-white hover:text-orange-400' }}">
                                Home
                            </a>

                            <a href="{{ route('about') }}"
                                class="px-3 py-2 rounded-md text-sm font-medium
                                {{ Route::is('about') ? 'bg-orange-600 text-white' : 'text-white hover:text-orange-400' }}">
                                About
                            </a>

                            <a href="{{ route('contact') }}"
                                class="px-3 py-2 rounded-md text-sm font-medium
                                {{ Route::is('contact') ? 'bg-orange-600 text-white' : 'text-white hover:text-orange-400' }}">
                                Contact
                            </a>

                            <a href="{{ route('register') }}"
                                class="px-3 py-2 rounded-md text-sm font-medium
                                {{ Route::is('register') ? 'bg-orange-600 text-white' : 'text-white hover:text-orange-400' }}">
                                Register
                            </a>

                            <a href="{{ route('login') }}"
                                class="px-3 py-2 rounded-md text-sm font-medium
                                {{ Route::is('login') ? 'bg-orange-600 text-white' : 'text-white hover:text-orange-400' }}">
                                Login
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <div class="-mr-2 flex md:hidden">
                    <button id="mobile-menu-button"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-200 hover:text-white hover:bg-gray-700 focus:outline-none">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- ✅ Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-black">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                @if(session('user_id'))
                    <!-- ✅ Logout only -->
                    <a href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="block px-3 py-2 rounded-md text-base font-medium text-red-500 hover:bg-red-700 hover:text-white">
                        Logout
                    </a>
                @else
                    <!-- ✅ Show when no session -->
                    <a href="{{ route('home') }}"
                        class="block px-3 py-2 rounded-md text-base font-medium
                        {{ Route::is('home') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                        Home
                    </a>

                    <a href="{{ route('about') }}"
                        class="block px-3 py-2 rounded-md text-base font-medium
                        {{ Route::is('about') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                        About
                    </a>

                    <a href="{{ route('contact') }}"
                        class="block px-3 py-2 rounded-md text-base font-medium
                        {{ Route::is('contact') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                        Contact
                    </a>

                    <a href="{{ route('register') }}"
                        class="block px-3 py-2 rounded-md text-base font-medium
                        {{ Route::is('register') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                        Register
                    </a>

                    <a href="{{ route('login') }}"
                        class="block px-3 py-2 rounded-md text-base font-medium
                        {{ Route::is('login') ? 'bg-orange-600 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                        Login
                    </a>
                @endif
            </div>
        </div>
    </nav>
    <!-- ✅ End Navbar -->

    <!-- Main Content -->
    <main class="@if (!Request::is('dashboard')) pt-16 @endif">
        @yield('content')
    </main>

    <script>
        // ✅ Toggle Mobile Menu
        document.getElementById('mobile-menu-button')?.addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        // ✅ Change Navbar Color on Scroll
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (!navbar) return;
            if (window.scrollY > 50) {
                navbar.classList.remove('bg-black');
                navbar.classList.add('bg-pcgblue', 'shadow-lg');
            } else {
                navbar.classList.add('bg-black');
                navbar.classList.remove('bg-pcgblue', 'shadow-lg');
            }
        });
    </script>

</body>
</html>
