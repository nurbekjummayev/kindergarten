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

    <!-- Breadcrumb -->
    <section class="bg-white py-4 border-b">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-2 text-sm text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-blue-600">Bosh sahifa</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <a href="{{ route('blog.index') }}" class="hover:text-blue-600">Blog</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-gray-900">{{ Str::limit($blog->title, 50) }}</span>
            </div>
        </div>
    </section>

    <!-- Article Content -->
    <article class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Category Badge -->
            <div class="mb-6">
                <a href="{{ route('blog.index', ['category' => $blog->category->value]) }}"
                   class="inline-flex items-center gap-2 px-4 py-2 bg-{{ $blog->category->getColor() }}-100 text-{{ $blog->category->getColor() }}-800 rounded-full text-sm font-semibold hover:bg-{{ $blog->category->getColor() }}-200 transition">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        {!! $blog->category->getIcon() ? '<use href="#' . $blog->category->getIcon() . '"/>' : '' !!}
                    </svg>
                    {{ $blog->category->getLabel() }}
                </a>
            </div>

            <!-- Title -->
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                {{ $blog->title }}
            </h1>

            <!-- Meta Information -->
            <div class="flex flex-wrap items-center gap-6 pb-6 mb-8 border-b border-gray-200">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-purple-400 rounded-full flex items-center justify-center text-white text-lg font-semibold">
                        {{ substr($blog->author->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900">{{ $blog->author->name }}</p>
                        <p class="text-sm text-gray-500">Muallif</p>
                    </div>
                </div>
                <div class="flex items-center gap-1 text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span>{{ $blog->published_at->format('d M, Y') }}</span>
                </div>
                <div class="flex items-center gap-1 text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <span>{{ $blog->views }} ko'rishlar</span>
                </div>
            </div>

            <!-- Featured Image -->
            @if($blog->featured_image)
                <div class="mb-8 rounded-xl overflow-hidden shadow-lg">
                    <img src="{{ Storage::url($blog->featured_image) }}"
                         alt="{{ $blog->title }}"
                         class="w-full h-auto">
                </div>
            @endif

            <!-- Excerpt -->
            <div class="bg-blue-50 border-l-4 border-blue-600 p-6 mb-8 rounded-r-lg">
                <p class="text-lg text-gray-700 leading-relaxed">
                    {{ $blog->excerpt }}
                </p>
            </div>

            <!-- Content -->
            <div class="prose prose-lg max-w-none">
                <div class="text-gray-800 leading-relaxed space-y-4">
                    {!! nl2br($blog->content) !!}
                </div>
            </div>

            <!-- Share Section -->
            <div class="mt-12 pt-8 border-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Ulashish</h3>
                <div class="flex gap-4">
                    <button onclick="shareOnFacebook()" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        Facebook
                    </button>
                    <button onclick="shareOnTelegram()" class="px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.14.18-.357.295-.6.295-.002 0-.003 0-.005 0l.213-3.054 5.56-5.022c.24-.213-.054-.334-.373-.121L7.773 13.98l-2.886-.906c-.626-.197-.64-.626.132-.929l11.26-4.34c.524-.194.982.127.813.926z"/>
                        </svg>
                        Telegram
                    </button>
                    <button onclick="copyLink()" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
        <section class="bg-gray-100 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-8">O'xshash maqolalar</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($relatedBlogs as $relatedBlog)
                        <article class="bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden group">
                            <!-- Featured Image -->
                            <div class="relative h-48 bg-gradient-to-br from-blue-100 to-purple-100 overflow-hidden">
                                @if($relatedBlog->featured_image)
                                    <img src="{{ Storage::url($relatedBlog->featured_image) }}"
                                         alt="{{ $relatedBlog->title }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-20 h-20 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition line-clamp-2">
                                    <a href="{{ route('blog.show', $relatedBlog->slug) }}">
                                        {{ $relatedBlog->title }}
                                    </a>
                                </h3>
                                <p class="text-gray-600 text-sm line-clamp-2 mb-4">
                                    {{ $relatedBlog->excerpt }}
                                </p>
                                <div class="flex items-center justify-between text-sm text-gray-500">
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
    <section class="py-8 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-700 font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Barcha bloglarga qaytish
            </a>
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
    </script>
</body>
</html>
