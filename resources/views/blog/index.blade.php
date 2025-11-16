<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Bog'chalar platformasi</title>
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

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-8 md:py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-2xl md:text-4xl lg:text-5xl font-bold mb-3 md:mb-4">Blog va Yangiliklar</h1>
            <p class="text-sm md:text-lg lg:text-xl text-blue-100 max-w-2xl mx-auto">
                Bolalar tarbiyasi, ta'lim va sog'lik haqida foydali maqolalar
            </p>
        </div>
    </section>

    <!-- Filters Section -->
    <section class="bg-white shadow-sm py-4 md:py-6 sticky top-14 md:top-16 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <form method="GET" action="{{ route('blog.index') }}" class="flex flex-col md:flex-row flex-wrap gap-3 md:gap-4 items-stretch md:items-center">
                <!-- Search -->
                <div class="flex-1 min-w-full md:min-w-[200px]">
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Qidirish..."
                           class="w-full px-3 md:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm md:text-base">
                </div>

                <!-- Category Filter -->
                <select name="category" class="w-full md:w-auto px-3 md:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 text-sm md:text-base">
                    <option value="">Barcha kategoriyalar</option>
                    @foreach(\App\Enums\BlogCategory::cases() as $category)
                        <option value="{{ $category->value }}" {{ request('category') == $category->value ? 'selected' : '' }}>
                            {{ $category->getLabel() }}
                        </option>
                    @endforeach
                </select>

                <!-- Sort -->
                <select name="sort_by" class="w-full md:w-auto px-3 md:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 text-sm md:text-base">
                    <option value="latest" {{ request('sort_by') == 'latest' ? 'selected' : '' }}>Eng yangi</option>
                    <option value="popular" {{ request('sort_by') == 'popular' ? 'selected' : '' }}>Mashhur</option>
                    <option value="oldest" {{ request('sort_by') == 'oldest' ? 'selected' : '' }}>Eng eski</option>
                </select>

                <div class="flex gap-2 md:gap-0">
                    <button type="submit" class="flex-1 md:flex-none px-5 md:px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:shadow-lg transition flex items-center justify-center gap-2 text-sm md:text-base">
                        <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <span class="md:hidden">Qidirish</span>
                    </button>

                    @if(request()->hasAny(['search', 'category', 'sort_by']))
                        <a href="{{ route('blog.index') }}" class="flex-1 md:flex-none px-4 py-2 text-gray-600 hover:text-gray-800 text-sm md:text-base text-center border border-gray-300 rounded-lg md:border-0">
                            Tozalash
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </section>

    <!-- Blog Posts Grid -->
    <section class="py-8 md:py-12 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($blogs->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-6 lg:gap-8">
                    @foreach($blogs as $blog)
                        <article class="bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden group">
                            <!-- Featured Image -->
                            <div class="relative h-40 md:h-48 bg-gradient-to-br from-blue-100 to-purple-100 overflow-hidden">
                                @if($blog->featured_image)
                                    <img src="{{ Storage::url($blog->featured_image) }}"
                                         alt="{{ $blog->title }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-16 h-16 md:w-20 md:h-20 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                        </svg>
                                    </div>
                                @endif
                                <!-- Category Badge -->
                                <div class="absolute top-3 md:top-4 left-3 md:left-4">
                                    <span class="px-2 md:px-3 py-0.5 md:py-1 bg-{{ $blog->category->getColor() }}-100 text-{{ $blog->category->getColor() }}-800 text-xs font-semibold rounded-full">
                                        {{ $blog->category->getLabel() }}
                                    </span>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-4 md:p-5 lg:p-6">
                                <!-- Meta -->
                                <div class="flex items-center gap-3 md:gap-4 text-xs md:text-sm text-gray-500 mb-2 md:mb-3">
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
                                <h3 class="text-base md:text-lg lg:text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition line-clamp-2">
                                    <a href="{{ route('blog.show', $blog->slug) }}">
                                        {{ $blog->title }}
                                    </a>
                                </h3>

                                <!-- Excerpt -->
                                <p class="text-sm md:text-base text-gray-600 mb-3 md:mb-4 line-clamp-3">
                                    {{ $blog->excerpt }}
                                </p>

                                <!-- Author & Read More -->
                                <div class="flex items-center justify-between pt-3 md:pt-4 border-t border-gray-100">
                                    <div class="flex items-center gap-1.5 md:gap-2">
                                        <div class="w-7 h-7 md:w-8 md:h-8 bg-gradient-to-br from-blue-400 to-purple-400 rounded-full flex items-center justify-center text-white text-xs md:text-sm font-semibold">
                                            {{ substr($blog->author->name, 0, 1) }}
                                        </div>
                                        <span class="text-xs md:text-sm text-gray-600 truncate">{{ $blog->author->name }}</span>
                                    </div>
                                    <a href="{{ route('blog.show', $blog->slug) }}" class="text-blue-600 hover:text-blue-700 font-medium text-xs md:text-sm flex items-center gap-1 whitespace-nowrap">
                                        Batafsil
                                        <svg class="w-3.5 h-3.5 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8 md:mt-12 flex justify-center">
                    {{ $blogs->links() }}
                </div>
            @else
                <div class="text-center py-12 md:py-16">
                    <svg class="w-20 h-20 md:w-24 md:h-24 mx-auto text-gray-300 mb-3 md:mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <h3 class="text-lg md:text-xl font-semibold text-gray-700 mb-2">Hech narsa topilmadi</h3>
                    <p class="text-sm md:text-base text-gray-500 mb-4 md:mb-6">Qidiruv natijasi bo'yicha blog topilmadi</p>
                    <a href="{{ route('blog.index') }}" class="inline-block px-5 md:px-6 py-2.5 md:py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:shadow-lg transition text-sm md:text-base">
                        Barcha bloglarni ko'rish
                    </a>
                </div>
            @endif
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
