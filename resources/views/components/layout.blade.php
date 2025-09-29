<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>job board @isset($title)- {{ $title }}@endisset</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
<div class="min-h-full">
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">

                <!-- Logo kısmı -->
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img
                            class="h-8 w-8"
                            src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                            alt="Your Company"
                        />
                    </div>

                    <!-- Desktop Menü (md ve üstü cihazlarda görünür) -->
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <!-- Navigation links -->
                            <x-nav-link href="/" :active="request()->is('/')">Dashboard</x-nav-link>
                            <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                            <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                            <x-nav-link href="/blog" :active="request()->is('blog')">Blog</x-nav-link>
                        </div>
                    </div>
                </div>

                <!-- Kullanıcı giriş bilgisi -->
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        @auth
                            <span class="text-white mr-4">{{ Auth::user()->name }}</span>

                            <form method ="POST"  action="/logout">
                                @csrf
                                <button type="submit" class="bg-gray-800 text-white hover:text-gray-300 px-3 py-2 rounded-md">
                                Logout
                                </button>
                            </form>

                        @else
                            <a href="/signup" class="text-gray-400 hover:text-white px-2">Signup</a>
                            <a href="/login" class="text-gray-400 hover:text-white px-2">Login</a>
                        @endauth
                    </div>
                </div>

                <!-- Mobile menü butonu () -->
                <div class="-mr-2 flex md:hidden">
                    <button type="button"
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500"
                        onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>

                        <!-- icon -->
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                             aria-hidden="true" class="size-6">
                            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->   <!-- Bu kısım mobil cihazlarda açılıp kapanan menüdür -->
        <div id="mobile-menu" class="hidden md:hidden">
            <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                <!-- Menü linkleri -->
                <a href="/" class="block rounded-md px-3 py-2 text-base font-medium text-white bg-gray-950/50">Dashboard</a>
                <a href="/about" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">About</a>
                <a href="/contact" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">Contact</a>
                <a href="/blog" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">Blog</a>
            </div>

            <!-- Kullanıcı bilgisi mobilde -->
            <div class="border-t border-white/10 pt-4 pb-3">
                
            </div>
        </div>
    </nav>

    <!-- Başlık kısmı -->
    <div class="border-b border-indigo-800"></div>

    @if(isset($title))
        <h1 class="text-3xl font-bold tracking-tight text-black ml-10 mt-4 mb-10">{{ $title }}</h1>
        <div class="border-b border-indigo-800"></div>

        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <!-- Sayfa içeriği -->
                {{ $slot }}
            </div>
        </main>
    @endif
</body>
</html>
