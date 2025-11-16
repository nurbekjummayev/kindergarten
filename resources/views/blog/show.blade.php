<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blog->title }} - Bog'chalar platformasi</title>
    <meta name="description" content="{{ $blog->excerpt }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
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

    <!-- Breadcrumb -->
    <section class="bg-white py-3 md:py-4 border-b">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-1.5 md:gap-2 text-xs md:text-sm text-gray-600 overflow-x-auto">
                <a href="{{ route('home') }}" class="hover:text-blue-600 whitespace-nowrap">Bosh sahifa</a>
                <svg class="w-3.5 h-3.5 md:w-4 md:h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <a href="{{ route('blog.index') }}" class="hover:text-blue-600 whitespace-nowrap">Blog</a>
                <svg class="w-3.5 h-3.5 md:w-4 md:h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-gray-900 truncate">{{ Str::limit($blog->title, 50) }}</span>
            </div>
        </div>
    </section>

    <!-- Article Content -->
    <article class="py-6 md:py-10 lg:py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Category Badge -->
            <div class="mb-4 md:mb-6">
                <a href="{{ route('blog.index', ['category' => $blog->category->value]) }}"
                   class="inline-flex items-center gap-1.5 md:gap-2 px-3 md:px-4 py-1.5 md:py-2 bg-{{ $blog->category->getColor() }}-100 text-{{ $blog->category->getColor() }}-800 rounded-full text-xs md:text-sm font-semibold hover:bg-{{ $blog->category->getColor() }}-200 transition">
                    <svg class="w-3.5 h-3.5 md:w-4 md:h-4" fill="currentColor" viewBox="0 0 24 24">
                        {!! $blog->category->getIcon() ? '<use href="#' . $blog->category->getIcon() . '"/>' : '' !!}
                    </svg>
                    {{ $blog->category->getLabel() }}
                </a>
            </div>

            <!-- Title -->
            <h1 class="text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-bold text-gray-900 mb-4 md:mb-6 leading-tight">
                {{ $blog->title }}
            </h1>

            <!-- Meta Information -->
            <div class="flex flex-wrap items-center gap-4 md:gap-6 pb-4 md:pb-6 mb-6 md:mb-8 border-b border-gray-200">
                <div class="flex items-center gap-2 md:gap-3">
                    <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-blue-400 to-purple-400 rounded-full flex items-center justify-center text-white text-base md:text-lg font-semibold">
                        {{ substr($blog->author->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="text-sm md:text-base font-semibold text-gray-900">{{ $blog->author->name }}</p>
                        <p class="text-xs md:text-sm text-gray-500">Muallif</p>
                    </div>
                </div>
                <div class="flex items-center gap-1 text-gray-600 text-xs md:text-sm">
                    <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span>{{ $blog->published_at->format('d M, Y') }}</span>
                </div>
                <div class="flex items-center gap-1 text-gray-600 text-xs md:text-sm">
                    <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <span>{{ $blog->views }} ko'rishlar</span>
                </div>
            </div>

            <!-- Featured Image -->
            @if($blog->featured_image)
                <div class="mb-6 md:mb-8 rounded-xl overflow-hidden shadow-lg">
                    <img src="{{ Storage::url($blog->featured_image) }}"
                         alt="{{ $blog->title }}"
                         class="w-full h-auto">
                </div>
            @endif

            <!-- Excerpt -->
            <div class="bg-blue-50 border-l-4 border-blue-600 p-4 md:p-5 lg:p-6 mb-6 md:mb-8 rounded-r-lg">
                <p class="text-sm md:text-base lg:text-lg text-gray-700 leading-relaxed">
                    {{ $blog->excerpt }}
                </p>
            </div>

            <!-- Content -->
            <div class="prose prose-sm md:prose-base lg:prose-lg max-w-none">
                <div class="text-gray-800 leading-relaxed space-y-3 md:space-y-4 text-sm md:text-base">
                    {!! nl2br($blog->content) !!}
                </div>
            </div>

            <!-- Share Section -->
            <div class="mt-8 md:mt-12 pt-6 md:pt-8 border-t border-gray-200">
                <h3 class="text-base md:text-lg font-semibold text-gray-900 mb-3 md:mb-4">Ulashish</h3>
                <div class="flex flex-col sm:flex-row gap-3 md:gap-4">
                    <button onclick="shareOnFacebook()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition flex items-center justify-center gap-2 text-sm md:text-base">
                        <svg class="w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        Facebook
                    </button>
                    <button onclick="shareOnTelegram()" class="px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition flex items-center justify-center gap-2 text-sm md:text-base">
                        <svg class="w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.14.18-.357.295-.6.295-.002 0-.003 0-.005 0l.213-3.054 5.56-5.022c.24-.213-.054-.334-.373-.121L7.773 13.98l-2.886-.906c-.626-.197-.64-.626.132-.929l11.26-4.34c.524-.194.982.127.813.926z"/>
                        </svg>
                        Telegram
                    </button>
                    <button onclick="copyLink()" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition flex items-center justify-center gap-2 text-sm md:text-base">
                        <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                        Nusxa olish
                    </button>
                </div>
            </div>
        </div>
    </article>

    <!-- Related Posts -->
    @if($relatedBlogs->count() > 0)
        <section class="bg-gray-100 py-8 md:py-12 lg:py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 md:mb-8">O'xshash maqolalar</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-6 lg:gap-8">
                    @foreach($relatedBlogs as $relatedBlog)
                        <article class="bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden group">
                            <!-- Featured Image -->
                            <div class="relative h-40 md:h-48 bg-gradient-to-br from-blue-100 to-purple-100 overflow-hidden">
                                @if($relatedBlog->featured_image)
                                    <img src="{{ Storage::url($relatedBlog->featured_image) }}"
                                         alt="{{ $relatedBlog->title }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-16 h-16 md:w-20 md:h-20 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <!-- Content -->
                            <div class="p-4 md:p-5 lg:p-6">
                                <h3 class="text-base md:text-lg font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition line-clamp-2">
                                    <a href="{{ route('blog.show', $relatedBlog->slug) }}">
                                        {{ $relatedBlog->title }}
                                    </a>
                                </h3>
                                <p class="text-gray-600 text-xs md:text-sm line-clamp-2 mb-3 md:mb-4">
                                    {{ $relatedBlog->excerpt }}
                                </p>
                                <div class="flex items-center justify-between text-xs md:text-sm text-gray-500">
                                    <span>{{ $relatedBlog->published_at->format('d M, Y') }}</span>
                                    <a href="{{ route('blog.show', $relatedBlog->slug) }}" class="text-blue-600 hover:text-blue-700 font-medium">
                                        O'qish →
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Back to Blog -->
    <section class="py-6 md:py-8 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-1.5 md:gap-2 text-blue-600 hover:text-blue-700 font-medium text-sm md:text-base">
                <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Barcha bloglarga qaytish
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8 md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h3 class="text-xl md:text-2xl font-bold mb-3 md:mb-4">Bog'chalar platformasi</h3>
                <p class="text-sm md:text-base text-gray-400 mb-4 md:mb-6">O'zbekistondagi eng yaxshi bog'chalarni topishning qulay yo'li</p>
                <div class="flex flex-wrap justify-center gap-4 md:gap-6 text-xs md:text-sm">
                    <a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition">Bosh sahifa</a>
                    <a href="{{ route('blog.index') }}" class="text-gray-400 hover:text-white transition">Blog</a>
                    <a href="{{ route('faq') }}" class="text-gray-400 hover:text-white transition">FAQ</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function shareOnFacebook() {
            window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(window.location.href), '_blank', 'width=600,height=400');
        }

        function shareOnTelegram() {
            window.open('https://t.me/share/url?url=' + encodeURIComponent(window.location.href) + '&text=' + encodeURIComponent(document.title), '_blank', 'width=600,height=400');
        }

        function copyLink() {
            navigator.clipboard.writeText(window.location.href).then(function() {
                alert('Havola nusxa olindi!');
            });
        }

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

    </script>
</body>
</html>
