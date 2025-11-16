<div class="space-y-3 md:space-y-4">
    <!-- Average Rating Display (Top) -->
    <div class="flex items-center gap-2 md:gap-4 pb-2 md:pb-3 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center gap-0.5 md:gap-1">
            @for ($i = 1; $i <= 5; $i++)
                <svg class="h-4 w-4 md:h-5 md:w-5 lg:h-6 lg:w-6 {{ $averageRating >= $i ? 'text-yellow-400' : ($averageRating >= $i - 0.5 ? 'text-yellow-400' : 'text-gray-300') }} fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    @if($averageRating >= $i)
                        <!-- Full star -->
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    @elseif($averageRating >= $i - 0.5)
                        <!-- Half star -->
                        <defs>
                            <linearGradient id="half-{{ $i }}">
                                <stop offset="50%" stop-color="currentColor"/>
                                <stop offset="50%" stop-color="#d1d5db" stop-opacity="1"/>
                            </linearGradient>
                        </defs>
                        <path fill="url(#half-{{ $i }})" d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    @else
                        <!-- Empty star -->
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    @endif
                </svg>
            @endfor
        </div>

        <div class="flex items-center gap-1.5 md:gap-2 text-xs md:text-sm">
            <span class="text-base md:text-lg lg:text-xl font-bold text-gray-900 dark:text-white">
                {{ number_format($averageRating, 1) }}
            </span>
            <span class="text-gray-600 dark:text-gray-400">
                ({{ $totalRatings }} {{ $totalRatings === 1 ? 'baho' : 'baholanish' }})
            </span>
        </div>
    </div>

    <!-- User Rating Section (Bottom) -->
    <div>
        @auth
            <div class="space-y-1.5 md:space-y-2">
                <p class="text-xs md:text-sm font-semibold text-gray-700 dark:text-gray-300">Sizning bahoingiz:</p>
                <div class="flex items-center gap-1 md:gap-2">
                    @for ($i = 1; $i <= 5; $i++)
                        <button
                            wire:click="rate({{ $i }})"
                            class="transition-all duration-200 hover:scale-110 focus:outline-none {{ $userRating >= $i ? 'text-yellow-400' : 'text-gray-300 hover:text-yellow-300' }}"
                            title="{{ $userRating >= $i ? 'Sizning bahoingiz: ' . $i : 'Baholash: ' . $i . ' yulduz' }}"
                        >
                            <svg class="h-6 w-6 md:h-7 md:w-7 lg:h-8 lg:w-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </button>
                    @endfor
                    @if($userRating)
                        <span class="ml-1 md:ml-2 text-xs md:text-sm text-gray-600 dark:text-gray-400">
                            ({{ $userRating }} yulduz)
                        </span>
                    @endif
                </div>
                @if(!$userRating)
                    <p class="text-xs text-gray-500 dark:text-gray-400 italic">
                        Yulduzchaga bosing va baholang
                    </p>
                @endif
            </div>
        @else
            <div class="bg-blue-50 dark:bg-blue-900/20 px-2 py-2 md:p-3 lg:p-4 rounded-lg">
                <p class="text-xs md:text-sm text-gray-700 dark:text-gray-300 text-center md:text-left">
                    <span class="hidden md:inline">Baholash uchun </span><a href="{{ route('filament.client.auth.login') }}" class="text-blue-600 hover:underline dark:text-blue-400 font-semibold">Tizimga kiring</a><span class="md:hidden"> (baholash)</span>
                </p>
            </div>
        @endauth
    </div>
</div>
