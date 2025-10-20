<div class="py-12 md:py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-10 md:mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">
                Top Reytingli Bog'chalar
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Ota-onalar tomonidan eng yuqori baholangan bog'chalar
            </p>
        </div>

        @if($kindergartens->count() > 0)
            <div class="relative">
                <!-- Swiper Container -->
                <div class="swiper topRatedSwiper overflow-hidden">
                    <div class="swiper-wrapper pb-8">
                        @foreach($kindergartens as $kindergarten)
                            <div class="swiper-slide">
                                <a href="{{ route('kindergarten.show', $kindergarten) }}"
                                   class="block bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 group overflow-hidden h-full">
                                    <!-- Image Section -->
                                    <div
                                        class="relative h-48 overflow-hidden bg-gradient-to-br from-blue-100 to-purple-100">
                                        @if($kindergarten->logo)
                                            <img src="{{ Storage::url($kindergarten->logo) }}"
                                                 alt="{{ $kindergarten->name }}"
                                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center">
                                                <svg class="w-20 h-20 text-blue-300" fill="none" stroke="currentColor"
                                                     viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                </svg>
                                            </div>
                                        @endif

                                        <!-- Rating Badge -->
                                        <div
                                            class="absolute top-4 right-4 bg-white rounded-full px-3 py-1.5 shadow-lg flex items-center gap-1">
                                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor"
                                                 viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                            <span
                                                class="font-bold text-gray-900">{{ number_format($kindergarten->ratings_avg_rating, 1) }}</span>
                                            <span
                                                class="text-xs text-gray-500">({{ $kindergarten->ratings_count }})</span>
                                        </div>
                                    </div>

                                    <!-- Content Section -->
                                    <div class="p-5">
                                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition line-clamp-1">
                                            {{ $kindergarten->name }}
                                        </h3>

                                        <!-- Info Grid -->
                                        <div class="space-y-2 mb-4">
                                            <!-- Organization -->
                                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                                <svg class="w-4 h-4 text-blue-500 flex-shrink-0" fill="none"
                                                     stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                </svg>
                                                <span
                                                    class="line-clamp-1">{{ $kindergarten->organization->name }}</span>
                                            </div>

                                            <!-- Location -->
                                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                                <svg class="w-4 h-4 text-red-500 flex-shrink-0" fill="none"
                                                     stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                <span class="line-clamp-1">{{ $kindergarten->address }}</span>
                                            </div>

                                            <!-- Age Range -->
                                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                                <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none"
                                                     stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                                </svg>
                                                <span>{{ $kindergarten->age_start }} - {{ $kindergarten->age_end }} yosh</span>
                                            </div>

                                            <!-- Price -->
                                            <div class="flex items-center gap-2 text-sm font-semibold text-blue-600">
                                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor"
                                                     viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span>{{ number_format($kindergarten->monthly_fee_start, 0, '.', ' ') }} - {{ number_format($kindergarten->monthly_fee_end, 0, '.', ' ') }} so'm/oy</span>
                                            </div>
                                        </div>

                                        <!-- View Details Button -->
                                        <div class="pt-3 border-t border-gray-100">
                                            <span
                                                class="text-blue-600 font-semibold text-sm flex items-center justify-center gap-2 group-hover:gap-3 transition-all">
                                                Batafsil ko'rish
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                     viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <!-- Navigation Buttons -->
                    <div
                        class="swiper-button-next !w-10 !h-10 md:!w-12 md:!h-12 !bg-white !rounded-full !shadow-lg after:!text-sm md:after:!text-base !text-blue-600"></div>
                    <div
                        class="swiper-button-prev !w-10 !h-10 md:!w-12 md:!h-12 !bg-white !rounded-full !shadow-lg after:!text-sm md:after:!text-base !text-blue-600"></div>

                    <!-- Pagination -->
                    <div class="swiper-pagination !bottom-0"></div>
                </div>
            </div>

            <!-- Initialize Swiper -->
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const topRatedSwiper = new Swiper('.topRatedSwiper', {
                        slidesPerView: 1,
                        spaceBetween: 20,
                        loop: true,
                        autoplay: {
                            delay: 3000,
                            disableOnInteraction: false,
                            pauseOnMouseEnter: true,
                        },
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                        },
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        breakpoints: {
                            640: {
                                slidesPerView: 2,
                                spaceBetween: 20,
                            },
                            768: {
                                slidesPerView: 2,
                                spaceBetween: 24,
                            },
                            1024: {
                                slidesPerView: 3,
                                spaceBetween: 24,
                            },
                            1280: {
                                slidesPerView: 4,
                                spaceBetween: 30,
                            },
                        },
                    });
                });
            </script>
        @else
            <!-- No Top Rated Kindergartens -->
            <div class="text-center py-12">
                <div class="bg-white rounded-2xl shadow-md p-8 max-w-md mx-auto">
                    <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Hozircha reytingli bog'chalar yo'q</h3>
                    <p class="text-gray-600">Birinchi bo'lib bog'chaga baho bering!</p>
                </div>
            </div>
        @endif
    </div>
</div>
