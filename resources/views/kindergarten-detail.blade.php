<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $kindergarten->name }} - Bog'chalar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @livewireStyles
</head>
<body class="bg-gray-50">
    <!-- Header/Navbar -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-blue-600">Bog'chalar.uz</h1>
                <nav class="flex gap-4">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600">Bosh sahifa</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Kindergarten Detail -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Galleries Carousel -->
                @if($kindergarten->galleries && count($kindergarten->galleries) > 0)
                    <div class="swiper kindergarten-detail-swiper h-96">
                        <div class="swiper-wrapper">
                            @foreach($kindergarten->galleries as $gallery)
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/' . $gallery) }}" alt="{{ $kindergarten->name }}" class="w-full h-96 object-cover">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                @elseif($kindergarten->logo)
                    <img src="{{ asset('storage/' . $kindergarten->logo) }}" alt="{{ $kindergarten->name }}" class="w-full h-96 object-cover">
                @else
                    <div class="w-full h-96 bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center">
                        <svg class="w-32 h-32 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                @endif

                <div class="p-8">
                    <!-- Header with Logo -->
                    <div class="flex items-start gap-6 mb-6">
                        @if($kindergarten->logo)
                            <img src="{{ asset('storage/' . $kindergarten->logo) }}" alt="{{ $kindergarten->name }}" class="w-24 h-24 rounded-full object-cover border-4 border-blue-100 shadow-lg">
                        @endif
                        <div class="flex-1">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h1 class="text-4xl font-bold mb-3">{{ $kindergarten->name }}</h1>
                                    <div class="flex items-center gap-3 mb-3">
                                        <span class="inline-block bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-semibold">
                                            {{ $kindergarten->organization->name }}
                                        </span>
                                        @if($kindergarten->published_at)
                                            <span class="text-gray-500 text-sm">
                                                Nashr qilingan: {{ $kindergarten->published_at->format('d.m.Y') }}
                                            </span>
                                        @endif
                                    </div>
                                    <!-- Rating Component -->
                                    <div class="mt-2">
                                        <livewire:kindergarten-rating :kindergarten="$kindergarten" />
                                    </div>
                                </div>
                                <button
                                    onclick="handleApplyClick({{ $kindergarten->id }})"
                                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition duration-200 transform hover:scale-105"
                                >
                                    <svg class="inline-block w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Ariza qoldirish
                                </button>
                            </div>
                        </div>
                    </div>

                    @if($kindergarten->description)
                        <div class="mb-8 prose max-w-none">
                            <h2 class="text-2xl font-semibold mb-3">Tavsif</h2>
                            <div class="text-gray-700 leading-relaxed">{!! $kindergarten->description !!}</div>
                        </div>
                    @endif

                    <!-- Key Information Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                        @if($kindergarten->age_start && $kindergarten->age_end)
                            <div class="flex items-start bg-blue-50 p-4 rounded-lg">
                                <svg class="w-8 h-8 text-blue-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                                <div>
                                    <h3 class="font-semibold mb-1 text-gray-800">Yosh oralig'i</h3>
                                    <p class="text-gray-700">{{ $kindergarten->age_start }} - {{ $kindergarten->age_end }} yosh</p>
                                </div>
                            </div>
                        @endif

                        @if($kindergarten->capacity)
                            <div class="flex items-start bg-green-50 p-4 rounded-lg">
                                <svg class="w-8 h-8 text-green-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                <div>
                                    <h3 class="font-semibold mb-1 text-gray-800">Sig'im</h3>
                                    <p class="text-gray-700">{{ $kindergarten->capacity }} bola</p>
                                </div>
                            </div>
                        @endif

                        @if($kindergarten->monthly_fee_start && $kindergarten->monthly_fee_end)
                            <div class="flex items-start bg-purple-50 p-4 rounded-lg">
                                <svg class="w-8 h-8 text-purple-600 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h3 class="font-semibold mb-1 text-gray-800">Oylik to'lov</h3>
                                    <p class="text-gray-700">{{ number_format($kindergarten->monthly_fee_start, 0, ',', ' ') }} - {{ number_format($kindergarten->monthly_fee_end, 0, ',', ' ') }} UZS</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Contact Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        @if($kindergarten->address)
                            <div class="flex items-start bg-gray-50 p-5 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <div>
                                    <h3 class="font-semibold mb-1 text-gray-800">Manzil</h3>
                                    <p class="text-gray-700">{{ $kindergarten->address }}</p>
                                    @if($kindergarten->latitude && $kindergarten->longitude)
                                        <a href="https://www.google.com/maps?q={{ $kindergarten->latitude }},{{ $kindergarten->longitude }}" target="_blank" class="text-blue-600 hover:underline text-sm mt-1 inline-block">
                                            Xaritada ko'rish →
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if($kindergarten->phones && $kindergarten->phones->count() > 0)
                            <div class="flex items-start bg-gray-50 p-5 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <div class="flex-1">
                                    <h3 class="font-semibold mb-2 text-gray-800">Telefon raqamlar</h3>
                                    <div class="space-y-1">
                                        @foreach($kindergarten->phones as $phone)
                                            <div class="flex items-center gap-2">
                                                <a href="tel:{{ $phone->phone_number }}" class="text-blue-600 hover:underline">
                                                    {{ $phone->phone_number }}
                                                </a>
                                                @if($phone->is_primary)
                                                    <span class="text-xs bg-blue-100 text-blue-700 px-2 py-0.5 rounded">Asosiy</span>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($kindergarten->email)
                            <div class="flex items-start bg-gray-50 p-5 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <div>
                                    <h3 class="font-semibold mb-1 text-gray-800">Email</h3>
                                    <a href="mailto:{{ $kindergarten->email }}" class="text-blue-600 hover:underline">{{ $kindergarten->email }}</a>
                                </div>
                            </div>
                        @endif

                        @if($kindergarten->website)
                            <div class="flex items-start bg-gray-50 p-5 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                                </svg>
                                <div>
                                    <h3 class="font-semibold mb-1 text-gray-800">Veb-sayt</h3>
                                    <a href="{{ $kindergarten->website }}" target="_blank" class="text-blue-600 hover:underline break-all">{{ $kindergarten->website }}</a>
                                </div>
                            </div>
                        @endif
                    </div>

                    @if($kindergarten->workingHours && $kindergarten->workingHours->count() > 0)
                        <div class="mb-8 bg-gradient-to-r from-blue-50 to-purple-50 p-6 rounded-lg">
                            <h3 class="text-2xl font-semibold mb-4">Ish vaqti</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                                @foreach($kindergarten->workingHours as $workingHour)
                                    <div class="flex justify-between items-center p-4 bg-white rounded-lg shadow-sm">
                                        <span class="font-medium text-gray-700">
                                            @php
                                                $days = [
                                                    'monday' => 'Dushanba',
                                                    'tuesday' => 'Seshanba',
                                                    'wednesday' => 'Chorshanba',
                                                    'thursday' => 'Payshanba',
                                                    'friday' => 'Juma',
                                                    'saturday' => 'Shanba',
                                                    'sunday' => 'Yakshanba',
                                                ];
                                                $dayKey = is_string($workingHour->day_of_week) ? $workingHour->day_of_week : $workingHour->day_of_week->value;
                                            @endphp
                                            {{ $days[$dayKey] ?? $dayKey }}
                                        </span>
                                        @if($workingHour->is_open)
                                            <span class="text-green-600 font-semibold text-sm">
                                                {{ \Carbon\Carbon::parse($workingHour->opening_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($workingHour->closing_time)->format('H:i') }}
                                            </span>
                                        @else
                                            <span class="text-red-600 font-semibold text-sm">Dam olish</span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if($kindergarten->kindergartenSocialNetworks && $kindergarten->kindergartenSocialNetworks->count() > 0)
                        <div class="mb-8">
                            <h3 class="text-2xl font-semibold mb-4">Ijtimoiy tarmoqlar</h3>
                            <div class="flex gap-3 flex-wrap">
                                @foreach($kindergarten->kindergartenSocialNetworks as $social)
                                    @if($social->is_active)
                                        <a href="{{ $social->url }}" target="_blank"
                                           class="inline-flex items-center gap-2 px-5 py-3 bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white rounded-lg transition shadow-md hover:shadow-lg">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm0 22C6.486 22 2 17.514 2 12S6.486 2 12 2s10 4.486 10 10-4.486 10-10 10z"/>
                                            </svg>
                                            {{ $social->socialNetwork->name }}
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="flex gap-4 pt-6 border-t">
                        <a href="{{ route('home') }}" class="bg-gray-200 text-gray-800 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
                            ← Orqaga
                        </a>
                        @if($kindergarten->phones && $kindergarten->phones->count() > 0)
                            <a href="tel:{{ $kindergarten->phones->first()->phone_number }}" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-3 rounded-lg font-semibold hover:from-blue-700 hover:to-purple-700 transition shadow-lg">
                                📞 Qo'ng'iroq qilish
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Comments Section -->
            <div class="mt-8">
                <livewire:kindergarten-comments :kindergarten="$kindergarten" />
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2025 Bog'chalar.uz. Barcha huquqlar himoyalangan.</p>
        </div>
    </footer>

    @livewireScripts
    <script>
        // Initialize Swiper for detail page
        document.addEventListener('DOMContentLoaded', function() {
            @if($kindergarten->galleries && count($kindergarten->galleries) > 0)
                new Swiper('.kindergarten-detail-swiper', {
                    loop: true,
                    autoplay: {
                        delay: 4000,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                        dynamicBullets: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    effect: 'fade',
                    fadeEffect: {
                        crossFade: true
                    },
                });
            @endif
        });

        // Handle Apply Button Click
        function handleApplyClick(kindergartenId) {
            @auth('web')
                @if(auth()->user()->role->value === 'client')
                    // Redirect to application create page with kindergarten_id
                    window.location.href = `/client/applications/create?kindergarten_id=${kindergartenId}`;
                @else
                    alert('Ariza faqat ota-onalar tomonidan qoldirilishi mumkin.');
                @endif
            @else
                // Redirect to login page
                window.location.href = '/client/login?redirect=' + encodeURIComponent(window.location.pathname);
            @endauth
        }
    </script>

    <style>
        .swiper-button-next, .swiper-button-prev {
            color: white;
            background: rgba(0, 0, 0, 0.6);
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
        .swiper-button-next:after, .swiper-button-prev:after {
            font-size: 18px;
        }
        .swiper-pagination-bullet {
            background: white;
            width: 10px;
            height: 10px;
        }
        .swiper-pagination-bullet-active {
            background: #2563eb;
            width: 24px;
            border-radius: 5px;
        }
        .prose h2 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
        }
        .prose p {
            margin-bottom: 0.75rem;
        }
    </style>
</body>
</html>
