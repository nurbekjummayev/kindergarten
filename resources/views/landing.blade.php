<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bog'chalar - Toshkent shahridagi eng yaxshi bog'chalar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>
<body class="bg-gray-50">
<!-- Header/Navbar -->
<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3 md:py-4">
        <div class="flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl md:text-2xl font-bold text-blue-600">Bog'chalar.uz</a>
            <nav class="flex gap-2 md:gap-4 items-center">
                <a href="{{ route('home') }}" class="hidden md:block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-lg transition">Bosh sahifa</a>

                <!-- Dropdown for Login Options -->
                <div class="relative group">
                    <button class="flex items-center gap-1 md:gap-2 bg-blue-600 text-white px-3 md:px-4 py-2 rounded-lg hover:bg-blue-700 transition text-sm md:text-base">
                        <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="hidden sm:inline">Kirish</span>
                        <svg class="w-3 h-3 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="absolute right-0 mt-2 w-52 md:w-56 bg-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
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
            </nav>
        </div>
    </div>
</header>

<!-- Hero Banner -->
<section class="bg-gradient-to-r from-blue-500 to-purple-600 text-white py-12 md:py-20">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-3 md:mb-4">Farzandingiz uchun eng yaxshi bog'cha toping</h2>
        <p class="text-base sm:text-lg md:text-xl mb-6 md:mb-8">Toshkent shahridagi barcha sifatli bog'chalar bir platformada</p>
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

<!-- Kindergartens List -->
<section id="kindergartens" class="py-8 md:py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl md:text-3xl font-bold mb-6 md:mb-8 text-center">Bog'chalar ro'yxati</h2>

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
</body>
</html>
