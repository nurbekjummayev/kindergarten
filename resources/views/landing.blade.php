<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bog'chalar - Temiz shahridagi eng yaxshi bog'chalar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @livewireStyles
</head>
<body class="bg-gray-50">
<!-- Header/Navbar -->
<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3 md:py-4">
        <div class="flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl md:text-2xl font-bold text-blue-600">Bog'chalar.uz</a>

            <nav class="flex gap-2 md:gap-4 items-center">
                <!-- Desktop Menu -->
                <a href="{{ route('home') }}" class="hidden md:block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-lg transition">Bosh sahifa</a>
                <a href="{{ route('blog.index') }}" class="hidden md:block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-lg transition">Blog</a>
                <a href="{{ route('faq') }}" class="hidden md:block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-lg transition">FAQ</a>

                <!-- Login Dropdown (Always visible) -->
                <div class="relative group" id="loginDropdown">
                    <button onclick="toggleLoginDropdown()" class="flex items-center gap-1 md:gap-2 bg-blue-600 text-white px-3 md:px-4 py-2 rounded-lg hover:bg-blue-700 transition text-sm md:text-base">
                        <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="hidden sm:inline">Kirish</span>
                        <svg class="w-3 h-3 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="loginDropdownMenu" class="absolute right-0 mt-2 w-52 md:w-56 bg-white rounded-lg shadow-lg opacity-0 invisible md:group-hover:opacity-100 md:group-hover:visible transition-all duration-200 z-50">
                        <div class="py-2">
                            <a href="{{ url('/client') }}" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-700 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                <div>
                                    <div class="font-semibold">Ota-ona</div>
                                    <div class="text-xs text-gray-500">Farzandingiz uchun</div>
                                </div>
                            </a>
                            <a href="{{ url('/organization') }}" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-amber-50 hover:text-amber-700 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <div>
                                    <div class="font-semibold">Tashkilot</div>
                                    <div class="text-xs text-gray-500">Bog'cha boshqaruvi</div>
                                </div>
                            </a>
                            <a href="{{ url('/admin') }}" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-700 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                <div>
                                    <div class="font-semibold">Administrator</div>
                                    <div class="text-xs text-gray-500">Tizim boshqaruvi</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <button onclick="toggleMobileMenu()" class="md:hidden p-2 text-gray-700 hover:text-blue-600 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </nav>
        </div>
    </div>

    <!-- Mobile Menu Modal -->
    <div id="mobileMenu" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden md:hidden">
        <div class="fixed inset-y-0 right-0 w-64 bg-white shadow-2xl transform transition-transform">
            <!-- Menu Header -->
            <div class="flex justify-between items-center p-4 border-b">
                <h3 class="text-lg font-bold text-gray-900">Menyu</h3>
                <button onclick="toggleMobileMenu()" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Menu Items -->
            <div class="py-4">
                <a href="{{ route('home') }}" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="font-medium">Bosh sahifa</span>
                </a>
                <a href="{{ route('blog.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                    <span class="font-medium">Blog</span>
                </a>
                <a href="{{ route('faq') }}" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-medium">FAQ</span>
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Hero Banner -->
<section class="bg-gradient-to-r from-blue-500 to-purple-600 text-white py-12 md:py-20">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-3 md:mb-4">Farzandingiz uchun eng yaxshi bog'cha toping</h2>
        <p class="text-base sm:text-lg md:text-xl mb-6 md:mb-8">Temiz shahridagi barcha sifatli bog'chalar bir platformada</p>
        <a href="#kindergartens"
           class="inline-block bg-white text-blue-600 px-6 md:px-8 py-2 md:py-3 rounded-lg font-semibold hover:bg-gray-100 transition text-sm md:text-base">
            Bog'chalarni ko'rish
        </a>
    </div>
</section>

<!-- Statistics -->
<section class="py-8 md:py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 md:gap-8">
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-blue-600 mb-2">{{ $statistics['total_kindergartens'] }}</div>
                <div class="text-sm md:text-base text-gray-600">Tasdiqlangan bog'chalar</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-blue-600 mb-2">{{ $statistics['total_organizations'] }}</div>
                <div class="text-sm md:text-base text-gray-600">Faol tashkilotlar</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-bold text-blue-600 mb-2">{{ $statistics['total_capacity'] }}</div>
                <div class="text-sm md:text-base text-gray-600">Jami sig'im</div>
            </div>
        </div>
    </div>
</section>

<!-- Top Rated Kindergartens Carousel -->
@livewire('top-rated-carousel')

<!-- How It Works Section -->
<section class="py-12 md:py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-10 md:mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">
                Qanday ishlaydi?
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Farzandingiz uchun eng yaxshi bog'chani topish uchun 3 ta oddiy qadam
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12 max-w-6xl mx-auto">
            <!-- Step 1: Search -->
            <div class="relative group">
                <div class="text-center">
                    <!-- Step Number Badge -->
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-gradient-to-r from-blue-600 to-purple-600 text-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl shadow-lg z-10">
                        1
                    </div>

                    <!-- Icon Container -->
                    <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl p-8 pt-10 transition-all duration-300 group-hover:shadow-xl group-hover:scale-105">
                        <div class="bg-white rounded-full p-6 inline-flex mb-4 shadow-md">
                            <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-3">
                            Qidiring
                        </h3>

                        <p class="text-gray-600 leading-relaxed">
                            Bog'cha nomini, joyini, yoshni yoki narxni kiritib, o'zingizga mos variantlarni toping
                        </p>

                        <!-- Features List -->
                        <ul class="mt-4 space-y-2 text-sm text-gray-600">
                            <li class="flex items-center justify-center gap-2">
                                <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                Qulay filtrlar
                            </li>
                            <li class="flex items-center justify-center gap-2">
                                <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                Tezkor natijalar
                            </li>
                        </ul>
                    </div>

                    <!-- Arrow -->
                    <div class="hidden md:block absolute top-1/2 -right-6 transform -translate-y-1/2 text-gray-300">
                        <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Step 2: Compare -->
            <div class="relative group">
                <div class="text-center">
                    <!-- Step Number Badge -->
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-gradient-to-r from-blue-600 to-purple-600 text-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl shadow-lg z-10">
                        2
                    </div>

                    <!-- Icon Container -->
                    <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl p-8 pt-10 transition-all duration-300 group-hover:shadow-xl group-hover:scale-105">
                        <div class="bg-white rounded-full p-6 inline-flex mb-4 shadow-md">
                            <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-3">
                            Taqqoslang
                        </h3>

                        <p class="text-gray-600 leading-relaxed">
                            Bog'chalar haqida to'liq ma'lumot, narxlar, reytinglar va izohlarni o'qing
                        </p>

                        <!-- Features List -->
                        <ul class="mt-4 space-y-2 text-sm text-gray-600">
                            <li class="flex items-center justify-center gap-2">
                                <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                Batafsil tavsif
                            </li>
                            <li class="flex items-center justify-center gap-2">
                                <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                Ota-onalar sharhlari
                            </li>
                        </ul>
                    </div>

                    <!-- Arrow -->
                    <div class="hidden md:block absolute top-1/2 -right-6 transform -translate-y-1/2 text-gray-300">
                        <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Step 3: Apply -->
            <div class="relative group">
                <div class="text-center">
                    <!-- Step Number Badge -->
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-gradient-to-r from-blue-600 to-purple-600 text-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl shadow-lg z-10">
                        3
                    </div>

                    <!-- Icon Container -->
                    <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl p-8 pt-10 transition-all duration-300 group-hover:shadow-xl group-hover:scale-105">
                        <div class="bg-white rounded-full p-6 inline-flex mb-4 shadow-md">
                            <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-3">
                            Ariza qoldiring
                        </h3>

                        <p class="text-gray-600 leading-relaxed">
                            Yoqqan bog'chaga to'g'ridan-to'g'ri platformamizdan ariza qoldiring
                        </p>

                        <!-- Features List -->
                        <ul class="mt-4 space-y-2 text-sm text-gray-600">
                            <li class="flex items-center justify-center gap-2">
                                <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                Oddiy forma
                            </li>
                            <li class="flex items-center justify-center gap-2">
                                <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                Tezkor javob
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Button -->
        <div class="text-center mt-12">
            <a href="#kindergartens" class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-lg font-semibold text-lg hover:from-blue-700 hover:to-purple-700 transition shadow-lg hover:shadow-xl transform hover:scale-105">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                Hoziroq qidirishni boshlang
            </a>
        </div>
    </div>
</section>


<!-- Categories Section -->
<section class="py-8 md:py-12 bg-gradient-to-r from-blue-50 to-purple-50">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl md:text-3xl font-bold mb-6 md:mb-8 text-center">Bog'cha turlari</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
            @foreach(\App\Enums\KindergartenType::cases() as $type)
                <a href="{{ route('home', ['type' => $type->value]) }}"
                   class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-6 hover:scale-105 {{ request('type') == $type->value ? 'ring-2 ring-blue-500 bg-blue-50' : '' }}">
                    <div class="flex flex-col items-center text-center space-y-3">
                        <div class="p-4 rounded-full {{
                            $type === \App\Enums\KindergartenType::STATE ? 'bg-blue-100 text-blue-600' :
                            ($type === \App\Enums\KindergartenType::PRIVATE ? 'bg-green-100 text-green-600' :
                            ($type === \App\Enums\KindergartenType::MONTESSORI ? 'bg-yellow-100 text-yellow-600' :
                            'bg-purple-100 text-purple-600'))
                        }}">
                            @if($type === \App\Enums\KindergartenType::STATE)
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            @elseif($type === \App\Enums\KindergartenType::PRIVATE)
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                            @elseif($type === \App\Enums\KindergartenType::MONTESSORI)
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            @else
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
                                </svg>
                            @endif
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 group-hover:text-blue-600 transition">
                                {{ $type->getLabel() }}
                            </h3>
                            <p class="text-xs text-gray-600 mt-1">
                                {{ $type->getDescription() }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>


<!-- Search and Filters -->
<section id="kindergartens" class="py-8 md:py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-6 md:mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-center flex-1">Bog'chalar ro'yxati</h2>

            <!-- Mobile Filter Button -->
            <button type="button" onclick="toggleFilterModal()" class="md:hidden bg-blue-600 text-white p-3 rounded-lg shadow-lg hover:bg-blue-700 transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                </svg>
                <span class="text-sm font-semibold">Filtr</span>
            </button>
        </div>

        <!-- Desktop Filter Form (Hidden on Mobile) -->
        <form method="GET" action="{{ route('home') }}#kindergartens" class="hidden md:block bg-white rounded-lg shadow-md p-4 md:p-6 mb-6 md:mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                <!-- Search -->
                <div class="lg:col-span-2">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-2">
                        <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Bog'cha nomi
                    </label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}"
                           placeholder="Bog'cha nomini kiriting..."
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                </div>

                <!-- Age Range -->
                <div>
                    <label for="age_min" class="block text-sm font-medium text-gray-700 mb-2">
                        <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        Bola yoshi (dan)
                    </label>
                    <input type="number" name="age_min" id="age_min" value="{{ request('age_min') }}"
                           placeholder="2"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                </div>

                <div>
                    <label for="age_max" class="block text-sm font-medium text-gray-700 mb-2">
                        Bola yoshi (gacha)
                    </label>
                    <input type="number" name="age_max" id="age_max" value="{{ request('age_max') }}"
                           placeholder="7"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                <!-- Price Range -->
                <div>
                    <label for="price_min" class="block text-sm font-medium text-gray-700 mb-2">
                        <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Narx (dan) UZS
                    </label>
                    <input type="number" name="price_min" id="price_min" value="{{ request('price_min') }}"
                           placeholder="500000"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                </div>

                <div>
                    <label for="price_max" class="block text-sm font-medium text-gray-700 mb-2">
                        Narx (gacha) UZS
                    </label>
                    <input type="number" name="price_max" id="price_max" value="{{ request('price_max') }}"
                           placeholder="2000000"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                </div>

                <!-- Category/Type Filter -->
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">
                        <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        Turi
                    </label>
                    <select name="type" id="type"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        <option value="">Barcha turlar</option>
                        @foreach(\App\Enums\KindergartenType::cases() as $typeOption)
                            <option value="{{ $typeOption->value }}" {{ request('type') == $typeOption->value ? 'selected' : '' }}>
                                {{ $typeOption->getLabel() }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Rating Filter -->
                <div>
                    <label for="min_rating" class="block text-sm font-medium text-gray-700 mb-2">
                        <svg class="inline-block w-4 h-4 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                        Min. reyting
                    </label>
                    <select name="min_rating" id="min_rating"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        <option value="">Barchasi</option>
                        <option value="4" {{ request('min_rating') == '4' ? 'selected' : '' }}>4+ yulduz</option>
                        <option value="3" {{ request('min_rating') == '3' ? 'selected' : '' }}>3+ yulduz</option>
                        <option value="2" {{ request('min_rating') == '2' ? 'selected' : '' }}>2+ yulduz</option>
                    </select>
                </div>

                <!-- Sort By -->
                <div>
                    <label for="sort_by" class="block text-sm font-medium text-gray-700 mb-2">
                        <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path>
                        </svg>
                        Saralash
                    </label>
                    <select name="sort_by" id="sort_by"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        <option value="newest" {{ request('sort_by') == 'newest' ? 'selected' : '' }}>Yangilari</option>
                        <option value="rating" {{ request('sort_by') == 'rating' ? 'selected' : '' }}>Yuqori reyting</option>
                        <option value="price_low" {{ request('sort_by') == 'price_low' ? 'selected' : '' }}>Arzon narx</option>
                        <option value="price_high" {{ request('sort_by') == 'price_high' ? 'selected' : '' }}>Qimmat narx</option>
                        <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Nomi bo'yicha</option>
                    </select>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-3 mt-4">
                <button type="submit"
                        class="flex-1 md:flex-none bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-3 rounded-lg font-semibold hover:from-blue-700 hover:to-purple-700 transition shadow-md">
                    <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Qidirish
                </button>
                <a href="{{ route('home') }}#kindergartens"
                   class="flex-1 md:flex-none bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition text-center">
                    <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Tozalash
                </a>
            </div>
        </form>

        <!-- Mobile Filter Modal -->
        <div id="filterModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden md:hidden">
            <div class="fixed inset-x-0 bottom-0 bg-white rounded-t-2xl shadow-2xl max-h-[90vh] overflow-y-auto">
                <!-- Modal Header -->
                <div class="sticky top-0 bg-white border-b px-4 py-4 flex justify-between items-center z-10">
                    <h3 class="text-lg font-bold text-gray-900">Qidiruv filtrlari</h3>
                    <button type="button" onclick="toggleFilterModal()" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Modal Form -->
                <form method="GET" action="{{ route('home') }}#kindergartens" class="p-4 pb-6">
                    <div class="space-y-4">
                        <!-- Search -->
                        <div>
                            <label for="mobile_search" class="block text-sm font-medium text-gray-700 mb-2">
                                <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Bog'cha nomi
                            </label>
                            <input type="text" name="search" id="mobile_search" value="{{ request('search') }}"
                                   placeholder="Bog'cha nomini kiriting..."
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Age Range -->
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label for="mobile_age_min" class="block text-sm font-medium text-gray-700 mb-2">
                                    <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                    Yosh (dan)
                                </label>
                                <input type="number" name="age_min" id="mobile_age_min" value="{{ request('age_min') }}"
                                       placeholder="2"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label for="mobile_age_max" class="block text-sm font-medium text-gray-700 mb-2">
                                    Yosh (gacha)
                                </label>
                                <input type="number" name="age_max" id="mobile_age_max" value="{{ request('age_max') }}"
                                       placeholder="7"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>

                        <!-- Price Range -->
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label for="mobile_price_min" class="block text-sm font-medium text-gray-700 mb-2">
                                    <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Narx (dan)
                                </label>
                                <input type="number" name="price_min" id="mobile_price_min" value="{{ request('price_min') }}"
                                       placeholder="500000"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label for="mobile_price_max" class="block text-sm font-medium text-gray-700 mb-2">
                                    Narx (gacha)
                                </label>
                                <input type="number" name="price_max" id="mobile_price_max" value="{{ request('price_max') }}"
                                       placeholder="2000000"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>

                        <!-- Type -->
                        <div>
                            <label for="mobile_type" class="block text-sm font-medium text-gray-700 mb-2">
                                <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                Turi
                            </label>
                            <select name="type" id="mobile_type"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Barcha turlar</option>
                                @foreach(\App\Enums\KindergartenType::cases() as $typeOption)
                                    <option value="{{ $typeOption->value }}" {{ request('type') == $typeOption->value ? 'selected' : '' }}>
                                        {{ $typeOption->getLabel() }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Rating -->
                        <div>
                            <label for="mobile_min_rating" class="block text-sm font-medium text-gray-700 mb-2">
                                <svg class="inline-block w-4 h-4 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                                Min. reyting
                            </label>
                            <select name="min_rating" id="mobile_min_rating"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Barchasi</option>
                                <option value="4" {{ request('min_rating') == '4' ? 'selected' : '' }}>4+ yulduz</option>
                                <option value="3" {{ request('min_rating') == '3' ? 'selected' : '' }}>3+ yulduz</option>
                                <option value="2" {{ request('min_rating') == '2' ? 'selected' : '' }}>2+ yulduz</option>
                            </select>
                        </div>

                        <!-- Sort -->
                        <div>
                            <label for="mobile_sort_by" class="block text-sm font-medium text-gray-700 mb-2">
                                <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path>
                                </svg>
                                Saralash
                            </label>
                            <select name="sort_by" id="mobile_sort_by"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="newest" {{ request('sort_by') == 'newest' ? 'selected' : '' }}>Yangilari</option>
                                <option value="rating" {{ request('sort_by') == 'rating' ? 'selected' : '' }}>Yuqori reyting</option>
                                <option value="price_low" {{ request('sort_by') == 'price_low' ? 'selected' : '' }}>Arzon narx</option>
                                <option value="price_high" {{ request('sort_by') == 'price_high' ? 'selected' : '' }}>Qimmat narx</option>
                                <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Nomi bo'yicha</option>
                            </select>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-3 pt-4">
                            <button type="submit"
                                    class="flex-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-blue-700 hover:to-purple-700 transition shadow-md">
                                <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Qidirish
                            </button>
                            <a href="{{ route('home') }}#kindergartens"
                               onclick="toggleFilterModal()"
                               class="flex-none bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition text-center">
                                <svg class="inline-block w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Results Count -->
        @if(request()->hasAny(['search', 'age_min', 'age_max', 'price_min', 'price_max', 'min_rating', 'sort_by']))
            <div class="mb-4 text-center">
                <p class="text-gray-600">
                    <span class="font-semibold text-blue-600">{{ $kindergartens->total() }}</span> ta bog'cha topildi
                </p>
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
            @forelse($kindergartens as $kindergarten)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                    <!-- Galleries Carousel -->
                    @if($kindergarten->galleries && count($kindergarten->galleries) > 0)
                        <div class="swiper kindergarten-swiper-{{ $kindergarten->id }} h-40 sm:h-48">
                            <div class="swiper-wrapper">
                                @foreach($kindergarten->galleries as $gallery)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('storage/' . $gallery) }}" alt="{{ $kindergarten->name }}"
                                             class="w-full h-40 sm:h-48 object-cover">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    @elseif($kindergarten->logo)
                        <img src="{{ asset('storage/' . $kindergarten->logo) }}" alt="{{ $kindergarten->name }}"
                             class="w-full h-40 sm:h-48 object-cover">
                    @else
                        <div
                            class="w-full h-40 sm:h-48 bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center">
                            <svg class="w-12 h-12 sm:w-16 sm:h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    @endif

                    <div class="p-4 md:p-6">
                        <!-- Logo va Name -->
                        <div class="flex items-center gap-2 md:gap-3 mb-3">
                            @if($kindergarten->logo)
                                <img src="{{ asset('storage/' . $kindergarten->logo) }}" alt="{{ $kindergarten->name }}"
                                     class="w-10 h-10 md:w-12 md:h-12 rounded-full object-cover border-2 border-blue-100">
                            @endif
                            <h3 class="text-lg md:text-xl font-semibold flex-1">{{ $kindergarten->name }}</h3>
                        </div>

                        <p class="text-gray-600 text-xs md:text-sm mb-3 md:mb-4 line-clamp-2">{!! Str::limit(strip_tags($kindergarten->description), 100) !!}</p>

                        <!-- Rating and Comments -->
                        <div class="flex items-center gap-4 mb-3 pb-3 border-b border-gray-200">
                            <!-- Average Rating -->
                            <div class="flex items-center gap-1.5">
                                <div class="flex items-center gap-0.5">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <svg class="h-4 w-4 {{ $kindergarten->averageRating() >= $i ? 'text-yellow-400' : 'text-gray-300' }} fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                        </svg>
                                    @endfor
                                </div>
                                <span class="text-xs font-semibold text-gray-700">
                                    {{ number_format($kindergarten->averageRating(), 1) }}
                                </span>
                                <span class="text-xs text-gray-500">
                                    ({{ $kindergarten->totalRatings() }})
                                </span>
                            </div>

                            <!-- Comments Count -->
                            <div class="flex items-center gap-1 text-gray-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                </svg>
                                <span class="text-xs font-medium">{{ $kindergarten->comments()->count() }}</span>
                            </div>
                        </div>

                        <div class="space-y-1.5 md:space-y-2 mb-3 md:mb-4">
                            <!-- Manzil -->
                            @if($kindergarten->address)
                                <div class="flex items-start text-xs md:text-sm text-gray-600">
                                    <svg class="w-3.5 h-3.5 md:w-4 md:h-4 mr-1.5 md:mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    {{ Str::limit($kindergarten->address, 50) }}
                                </div>
                            @endif

                            <!-- Yosh oralig'i -->
                            @if($kindergarten->age_start && $kindergarten->age_end)
                                <div class="flex items-center text-xs md:text-sm text-gray-600">
                                    <svg class="w-3.5 h-3.5 md:w-4 md:h-4 mr-1.5 md:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                    Yosh: {{ $kindergarten->age_start }}-{{ $kindergarten->age_end }} yosh
                                </div>
                            @endif

                            <!-- Sig'im -->
                            @if($kindergarten->capacity)
                                <div class="flex items-center text-xs md:text-sm text-gray-600">
                                    <svg class="w-3.5 h-3.5 md:w-4 md:h-4 mr-1.5 md:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    Sig'im: {{ $kindergarten->capacity }} bola
                                </div>
                            @endif

                            <!-- Oylik to'lov -->
                            @if($kindergarten->monthly_fee_start && $kindergarten->monthly_fee_end)
                                <div class="flex items-center text-xs md:text-sm font-semibold text-blue-600">
                                    <svg class="w-3.5 h-3.5 md:w-4 md:h-4 mr-1.5 md:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ number_format($kindergarten->monthly_fee_start, 0, ',', ' ') }}
                                    - {{ number_format($kindergarten->monthly_fee_end, 0, ',', ' ') }} UZS/oy
                                </div>
                            @endif

                        </div>

                        <a href="{{ route('kindergarten.show', $kindergarten) }}"
                           class="block w-full text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition text-sm md:text-base">
                            Batafsil ma'lumot
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-500 text-lg">Hozircha tasdiqlangan bog'chalar yo'q</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-6 md:mt-8">
            {{ $kindergartens->links() }}
        </div>
    </div>
</section>

<!-- Blog Section -->
@if($latestBlogs->count() > 0)
<section class="py-12 md:py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-8 md:mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Blog va Yangiliklar
            </h2>
            <p class="text-gray-600 text-base md:text-lg max-w-2xl mx-auto">
                Bolalar tarbiyasi, ta'lim va sog'lik haqida foydali maqolalar
            </p>
        </div>

        <!-- Blog Posts Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
            @foreach($latestBlogs as $blog)
                <article class="bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden group">
                    <!-- Featured Image -->
                    <div class="relative h-48 bg-gradient-to-br from-blue-100 to-purple-100 overflow-hidden">
                        @if($blog->featured_image)
                            <img src="{{ Storage::url($blog->featured_image) }}"
                                 alt="{{ $blog->title }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-20 h-20 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                </svg>
                            </div>
                        @endif
                        <!-- Category Badge -->
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-{{ $blog->category->getColor() }}-100 text-{{ $blog->category->getColor() }}-800 text-xs font-semibold rounded-full">
                                {{ $blog->category->getLabel() }}
                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <!-- Meta -->
                        <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>{{ $blog->published_at->format('d M, Y') }}</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <span>{{ $blog->views }}</span>
                            </div>
                        </div>

                        <!-- Title -->
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition line-clamp-2">
                            <a href="{{ route('blog.show', $blog->slug) }}">
                                {{ $blog->title }}
                            </a>
                        </h3>

                        <!-- Excerpt -->
                        <p class="text-gray-600 mb-4 line-clamp-3 text-sm">
                            {{ $blog->excerpt }}
                        </p>

                        <!-- Author & Read More -->
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-400 to-purple-400 rounded-full flex items-center justify-center text-white text-sm font-semibold">
                                    {{ substr($blog->author->name, 0, 1) }}
                                </div>
                                <span class="text-sm text-gray-600">{{ $blog->author->name }}</span>
                            </div>
                            <a href="{{ route('blog.show', $blog->slug) }}" class="text-blue-600 hover:text-blue-700 font-medium text-sm flex items-center gap-1">
                                Batafsil
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- View All Button -->
        <div class="text-center mt-10">
            <a href="{{ route('blog.index') }}" class="inline-block px-8 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:shadow-lg transition font-semibold">
                Barcha bloglarni ko'rish
            </a>
        </div>
    </div>
</section>
@endif

<!-- FAQ Section -->
<section class="py-12 md:py-16 bg-white">
    <div class="container mx-auto px-4 max-w-4xl">
        <!-- Section Header -->
        <div class="text-center mb-10 md:mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Ko'p so'raladigan savollar
            </h2>
            <p class="text-gray-600 text-base md:text-lg max-w-2xl mx-auto">
                Platformamiz haqida eng ko'p beriladigan savollarga javoblar
            </p>
        </div>

        <!-- FAQ Category 1: Bog'cha tanlash -->
        <div class="mb-12">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                Bog'cha tanlash
            </h2>

            <div class="space-y-4">
                <!-- Question 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="faq-button w-full text-left p-6 flex items-center justify-between hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900 pr-4">Qanday bog'cha tanlash kerak?</span>
                        <svg class="faq-icon w-6 h-6 text-blue-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-600 leading-relaxed">
                        <p class="mb-3">Bog'cha tanlashda quyidagi mezonlarga e'tibor bering:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li><strong>Joylashuv:</strong> Uyingizdan yoki ish joyingizdan qancha masofada joylashgan</li>
                            <li><strong>Narx:</strong> Oylik to'lov sizning byudjetingizga mos keladimi</li>
                            <li><strong>Yosh oralig'i:</strong> Bog'cha farzandingiz yoshiga mos kelishi kerak</li>
                            <li><strong>Reyting va izohlar:</strong> Boshqa ota-onalarning fikrlari muhim</li>
                            <li><strong>Bog'cha turi:</strong> Davlat, xususiy, Montessori yoki til o'rgatadigan bog'chalarni taqqoslang</li>
                            <li><strong>Dastur va o'qitish usullari:</strong> Bog'chada qanday dastur bo'yicha ta'lim berilishi</li>
                        </ul>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="faq-button w-full text-left p-6 flex items-center justify-between hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900 pr-4">Platformada qanday qilib qidirsam bo'ladi?</span>
                        <svg class="faq-icon w-6 h-6 text-blue-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-600 leading-relaxed">
                        <p class="mb-3">Platformamizda qidirish juda oson:</p>
                        <ol class="list-decimal list-inside space-y-2 ml-4">
                            <li>Bosh sahifada qidiruv formadan foydalaning</li>
                            <li>Bog'cha nomini, yosh oralig'ini yoki narxni kiriting</li>
                            <li>Filtrlar yordamida natijalarni toraytiring (tur, reyting, saralash)</li>
                            <li>Yoqqan bog'chani bosib, batafsil ma'lumotlarni ko'ring</li>
                        </ol>
                        <p class="mt-3">Barcha filtrlar real vaqtda ishlaydi va natijalar darhol yangilanadi.</p>
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="faq-button w-full text-left p-6 flex items-center justify-between hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900 pr-4">Bog'chalarni qanday taqqoslash mumkin?</span>
                        <svg class="faq-icon w-6 h-6 text-blue-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-600 leading-relaxed">
                        <p>Har bir bog'cha kartasida quyidagilar ko'rsatiladi:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4 mt-3">
                            <li>O'rtacha reyting (yulduzchalar)</li>
                            <li>Izohlar soni</li>
                            <li>Oylik to'lov oralig'i</li>
                            <li>Yosh oralig'i</li>
                            <li>Bog'cha turi</li>
                            <li>Manzil va bog'lanish ma'lumotlari</li>
                        </ul>
                        <p class="mt-3">Batafsil sahifada esa galereyalar, ish vaqtlari va boshqa ma'lumotlar mavjud.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Category 2: Ariza berish -->
        <div class="mb-12">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Ariza berish
            </h2>

            <div class="space-y-4">
                <!-- Question 4 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="faq-button w-full text-left p-6 flex items-center justify-between hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900 pr-4">Ariza qanday beriladi?</span>
                        <svg class="faq-icon w-6 h-6 text-blue-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-600 leading-relaxed">
                        <p class="mb-3">Ariza berish jarayoni juda oddiy:</p>
                        <ol class="list-decimal list-inside space-y-2 ml-4">
                            <li><strong>Ro'yxatdan o'ting:</strong> Platformaga tizimga kiring yoki yangi akkaunt yarating</li>
                            <li><strong>Bog'chani tanlang:</strong> Yoqqan bog'chaning sahifasiga o'ting</li>
                            <li><strong>Ariza tugmasini bosing:</strong> "Ariza qoldirish" yoki "Batafsil ma'lumot" tugmasini bosing</li>
                            <li><strong>Ma'lumotlarni to'ldiring:</strong> Oddiy formani to'ldiring (farzand ismi, yoshi, ota-ona ma'lumotlari)</li>
                            <li><strong>Yuborish:</strong> Arizani yuboring va javob kutib turing</li>
                        </ol>
                        <p class="mt-3 font-semibold text-gray-900">Bog'cha ma'muriyati sizga 1-3 ish kuni ichida javob beradi.</p>
                    </div>
                </div>

                <!-- Question 5 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="faq-button w-full text-left p-6 flex items-center justify-between hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900 pr-4">Bir nechta bog'chaga ariza bersam bo'ladimi?</span>
                        <svg class="faq-icon w-6 h-6 text-blue-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-600 leading-relaxed">
                        <p>Ha, albatta! Siz bir nechta bog'chaga ariza berishingiz mumkin. Bu sizga:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4 mt-3">
                            <li>Ko'proq tanlov imkoniyati beradi</li>
                            <li>Qabul qilish ehtimolini oshiradi</li>
                            <li>Narx va shartlarni taqqoslash imkonini beradi</li>
                        </ul>
                        <p class="mt-3">Tavsiya: 2-3 ta bog'chaga ariza bering va eng yaxshi javobni tanlang.</p>
                    </div>
                </div>

                <!-- Question 6 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="faq-button w-full text-left p-6 flex items-center justify-between hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900 pr-4">Arizamni qanday kuzataman?</span>
                        <svg class="faq-icon w-6 h-6 text-blue-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-600 leading-relaxed">
                        <p>Tizimga kirgandan so'ng, shaxsiy kabinetingizda:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4 mt-3">
                            <li>"Mening arizalarim" bo'limida barcha arizalaringizni ko'rishingiz mumkin</li>
                            <li>Har bir arizaning holati ko'rsatiladi (ko'rib chiqilmoqda, qabul qilindi, rad etildi)</li>
                            <li>Bog'cha javob berganda email yoki SMS orqali xabar keladi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Category 3: To'lovlar -->
        <div class="mb-12">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                To'lovlar haqida
            </h2>

            <div class="space-y-4">
                <!-- Question 7 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="faq-button w-full text-left p-6 flex items-center justify-between hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900 pr-4">Platformadan foydalanish pullikmi?</span>
                        <svg class="faq-icon w-6 h-6 text-blue-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-600 leading-relaxed">
                        <p class="text-lg font-semibold text-green-600 mb-3">Yo'q, platformamiz ota-onalar uchun mutlaqo bepul!</p>
                        <p>Siz quyidagilarni to'lovsiz qilishingiz mumkin:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4 mt-3">
                            <li>Bog'chalarni qidirish va ko'rish</li>
                            <li>Filtrlar va saralash</li>
                            <li>Ariza yuborish</li>
                            <li>Sharh va reyting qoldirish</li>
                            <li>Bog'chalar bilan to'g'ridan-to'g'ri bog'lanish</li>
                        </ul>
                    </div>
                </div>

                <!-- Question 8 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="faq-button w-full text-left p-6 flex items-center justify-between hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900 pr-4">Bog'chaga to'lovlar qanday amalga oshiriladi?</span>
                        <svg class="faq-icon w-6 h-6 text-blue-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-600 leading-relaxed">
                        <p>Bog'chaga to'lovlarni to'g'ridan-to'g'ri bog'cha bilan kelishib amalga oshirasiz:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4 mt-3">
                            <li><strong>Boshlang'ich to'lov:</strong> Ro'yxatga olish uchun birinchi to'lov (agar mavjud bo'lsa)</li>
                            <li><strong>Oylik to'lov:</strong> Har oy bo'sh bo'yicha bog'chaga to'lanadi</li>
                            <li><strong>To'lov usullari:</strong> Naqd, plastik karta yoki bank o'tkazmasi (bog'chaga qarab)</li>
                        </ul>
                        <p class="mt-3 text-sm bg-blue-50 p-3 rounded">
                            <strong>Muhim:</strong> Platformamiz to'lovlar jarayonida vositachi emas. Barcha to'lovlar to'g'ridan-to'g'ri bog'cha bilan amalga oshiriladi.
                        </p>
                    </div>
                </div>

                <!-- Question 9 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <button class="faq-button w-full text-left p-6 flex items-center justify-between hover:bg-gray-50 transition">
                        <span class="font-semibold text-gray-900 pr-4">Oylik to'lov nimalarni o'z ichiga oladi?</span>
                        <svg class="faq-icon w-6 h-6 text-blue-600 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-600 leading-relaxed">
                        <p>Oylik to'lov odatda quyidagilarni o'z ichiga oladi:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4 mt-3">
                            <li>Kunlik parvarish va ta'lim</li>
                            <li>Ovqatlanish (ertalab, tushlik, peşin)</li>
                            <li>O'quv mashg'ulotlari va o'yinlar</li>
                            <li>Asosiy o'quv materiallari</li>
                        </ul>
                        <p class="mt-3"><strong>Qo'shimcha to'lovlar:</strong></p>
                        <ul class="list-disc list-inside space-y-2 ml-4 mt-2">
                            <li>Qo'shimcha darslar (ingliz tili, sport, san'at)</li>
                            <li>Ekskursiyalar va tadbirlar</li>
                            <li>Transport xizmati (agar bo'lsa)</li>
                        </ul>
                        <p class="mt-3 text-sm bg-yellow-50 p-3 rounded">
                            Aniq ma'lumot uchun bog'cha bilan to'g'ridan-to'g'ri bog'laning.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-6 md:py-8 mt-8 md:mt-12">
    <div class="container mx-auto px-4 text-center">
        <p class="text-sm md:text-base">&copy; 2025 Bog'chalar.uz. Barcha huquqlar himoyalangan.</p>
    </div>
</footer>

<script>
    // Initialize Swiper for each kindergarten card
    document.addEventListener('DOMContentLoaded', function () {
        @foreach($kindergartens as $kindergarten)
        @if($kindergarten->galleries && count($kindergarten->galleries) > 0)
        new Swiper('.kindergarten-swiper-{{ $kindergarten->id }}', {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
        @endif
        @endforeach
    });

    // Mobile Menu Toggle
    function toggleMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        } else {
            menu.classList.add('hidden');
            document.body.style.overflow = '';
        }
    }

    // Login Dropdown Toggle (for mobile)
    function toggleLoginDropdown() {
        const dropdown = document.getElementById('loginDropdownMenu');
        dropdown.classList.toggle('opacity-0');
        dropdown.classList.toggle('invisible');
        dropdown.classList.toggle('opacity-100');
        dropdown.classList.toggle('visible');
    }

    // Mobile Filter Modal Toggle
    function toggleFilterModal() {
        const modal = document.getElementById('filterModal');
        if (modal.classList.contains('hidden')) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Prevent body scroll when modal is open
        } else {
            modal.classList.add('hidden');
            document.body.style.overflow = ''; // Restore body scroll
        }
    }

    // FAQ Accordion functionality
    const faqButtons = document.querySelectorAll('.faq-button');
    faqButtons.forEach(button => {
        button.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            const icon = this.querySelector('.faq-icon');

            // Close all other answers
            document.querySelectorAll('.faq-answer').forEach(item => {
                if (item !== answer && !item.classList.contains('hidden')) {
                    item.classList.add('hidden');
                    item.previousElementSibling.querySelector('.faq-icon').classList.remove('rotate-180');
                }
            });

            // Toggle current answer
            answer.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        });
    });

    // Close modals when clicking outside
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile menu
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileMenu) {
            mobileMenu.addEventListener('click', function(e) {
                if (e.target === mobileMenu) {
                    toggleMobileMenu();
                }
            });
        }

        // Login dropdown - close when clicking outside
        document.addEventListener('click', function(e) {
            const loginDropdown = document.getElementById('loginDropdown');
            const loginDropdownMenu = document.getElementById('loginDropdownMenu');
            if (loginDropdown && loginDropdownMenu && !loginDropdown.contains(e.target)) {
                loginDropdownMenu.classList.add('opacity-0');
                loginDropdownMenu.classList.add('invisible');
                loginDropdownMenu.classList.remove('opacity-100');
                loginDropdownMenu.classList.remove('visible');
            }
        });

        // Filter modal
        const modal = document.getElementById('filterModal');
        if (modal) {
            // Close modal when clicking outside
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    toggleFilterModal();
                }
            });

            // Handle form submit in modal
            const modalForm = modal.querySelector('form');
            if (modalForm) {
                modalForm.addEventListener('submit', function() {
                    // Close modal before form submits
                    toggleFilterModal();
                });
            }
        }

        // Smooth scroll to kindergartens section if hash is present
        if (window.location.hash === '#kindergartens') {
            setTimeout(function() {
                const section = document.getElementById('kindergartens');
                if (section) {
                    section.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }, 100);
        }
    });
</script>

<style>
    .swiper-button-next, .swiper-button-prev {
        color: white;
        background: rgba(0, 0, 0, 0.5);
        width: 28px;
        height: 28px;
        border-radius: 50%;
    }

    @media (min-width: 640px) {
        .swiper-button-next, .swiper-button-prev {
            width: 32px;
            height: 32px;
        }
    }

    .swiper-button-next:after, .swiper-button-prev:after {
        font-size: 12px;
    }

    @media (min-width: 640px) {
        .swiper-button-next:after, .swiper-button-prev:after {
            font-size: 14px;
        }
    }

    .swiper-pagination-bullet {
        background: white;
        width: 6px;
        height: 6px;
    }

    @media (min-width: 640px) {
        .swiper-pagination-bullet {
            width: 8px;
            height: 8px;
        }
    }

    .swiper-pagination-bullet-active {
        background: #2563eb;
    }
</style>
@livewireScripts
</body>
</html>
