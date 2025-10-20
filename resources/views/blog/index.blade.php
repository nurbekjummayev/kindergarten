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
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                        Bog'chalar
                    </a>
                    <div class="hidden md:flex items-center gap-6">
                        <a href="{{ route('home') }}" class="text-gray-600 hover:text-blue-600 transition">Bosh sahifa</a>
                        <a href="{{ route('blog.index') }}" class="text-blue-600 font-semibold">Blog</a>
                        <a href="{{ route('faq') }}" class="text-gray-600 hover:text-blue-600 transition">FAQ</a>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    @auth
                        <a href="{{ route('filament.client.pages.dashboard') }}" class="px-4 py-2 text-blue-600 hover:text-blue-700 font-medium">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('filament.client.auth.login') }}" class="px-4 py-2 text-blue-600 hover:text-blue-700 font-medium">
                            Kirish
                        </a>
                        <a href="{{ route('filament.client.auth.register') }}" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:shadow-lg transition">
                            Ro'yxatdan o'tish
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Blog va Yangiliklar</h1>
            <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto">
                Bolalar tarbiyasi, ta'lim va sog'lik haqida foydali maqolalar
            </p>
        </div>
    </section>

    <!-- Filters Section -->
    <section class="bg-white shadow-sm py-6 sticky top-16 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <form method="GET" action="{{ route('blog.index') }}" class="flex flex-wrap gap-4 items-center">
                <!-- Search -->
                <div class="flex-1 min-w-[200px]">
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Qidirish..."
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <!-- Category Filter -->
                <select name="category" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="">Barcha kategoriyalar</option>
                    @foreach(\App\Enums\BlogCategory::cases() as $category)
                        <option value="{{ $category->value }}" {{ request('category') == $category->value ? 'selected' : '' }}>
                            {{ $category->getLabel() }}
                        </option>
                    @endforeach
                </select>

                <!-- Sort -->
                <select name="sort_by" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="latest" {{ request('sort_by') == 'latest' ? 'selected' : '' }}>Eng yangi</option>
                    <option value="popular" {{ request('sort_by') == 'popular' ? 'selected' : '' }}>Mashhur</option>
                    <option value="oldest" {{ request('sort_by') == 'oldest' ? 'selected' : '' }}>Eng eski</option>
                </select>

                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:shadow-lg transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>

                @if(request()->hasAny(['search', 'category', 'sort_by']))
                    <a href="{{ route('blog.index') }}" class="px-4 py-2 text-gray-600 hover:text-gray-800">
                        Tozalash
                    </a>
                @endif
            </form>
        </div>
    </section>

    <!-- Blog Posts Grid -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($blogs->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($blogs as $blog)
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
                                <p class="text-gray-600 mb-4 line-clamp-3">
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

                <!-- Pagination -->
                <div class="mt-12 flex justify-center">
                    {{ $blogs->links() }}
                </div>
            @else
                <div class="text-center py-16">
                    <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">Hech narsa topilmadi</h3>
                    <p class="text-gray-500 mb-6">Qidiruv natijasi bo'yicha blog topilmadi</p>
                    <a href="{{ route('blog.index') }}" class="inline-block px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:shadow-lg transition">
                        Barcha bloglarni ko'rish
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h3 class="text-2xl font-bold mb-4">Bog'chalar platformasi</h3>
                <p class="text-gray-400 mb-6">O'zbekistondagi eng yaxshi bog'chalarni topishning qulay yo'li</p>
                <div class="flex justify-center gap-6 text-sm">
                    <a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition">Bosh sahifa</a>
                    <a href="{{ route('blog.index') }}" class="text-gray-400 hover:text-white transition">Blog</a>
                    <a href="{{ route('faq') }}" class="text-gray-400 hover:text-white transition">FAQ</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
