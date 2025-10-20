<div class="bg-white rounded-lg shadow-lg overflow-hidden">
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 px-8 py-6">
        <h2 class="text-3xl font-bold text-white flex items-center gap-3">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
            </svg>
            Fikr-mulohazalar
        </h2>
        <p class="text-blue-100 mt-2">Ushbu bog'cha haqida fikrlaringiz bilan bo'lishing</p>
    </div>

    <div class="p-8">
        @if (session()->has('message'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-800 px-6 py-4 rounded-lg mb-6 flex items-start gap-3">
                <svg class="w-6 h-6 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <div>
                    <p class="font-semibold">Muvaffaqiyatli yuborildi!</p>
                    <p class="text-sm">{{ session('message') }}</p>
                </div>
            </div>
        @endif

        @auth
            <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-xl p-6 mb-8 border-2 border-blue-100">
                <form wire:submit="submitComment">
                    <div class="mb-4">
                        <label for="content" class="block text-sm font-semibold text-gray-800 mb-2 flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Fikringizni yozing
                        </label>
                        <textarea
                            wire:model="content"
                            id="content"
                            rows="4"
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition bg-white"
                            placeholder="Bog'cha haqidagi fikrlaringiz, tavsiyalaringiz yoki savollaringizni yozing..."></textarea>
                        @error('content')
                            <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <button
                        type="submit"
                        class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold px-8 py-3 rounded-lg transition transform hover:scale-105 shadow-lg flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                        </svg>
                        Fikr qoldirish
                    </button>
                </form>
            </div>
        @else
            <div class="bg-gradient-to-r from-blue-50 to-purple-50 border-2 border-blue-200 rounded-xl px-6 py-5 mb-8 flex items-center gap-4">
                <svg class="w-12 h-12 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
                <div class="flex-1">
                    <p class="text-gray-800 font-medium mb-1">Fikr qoldirish uchun tizimga kiring</p>
                    <p class="text-gray-600 text-sm">O'z fikrlaringiz bilan bo'lishish uchun hisobingizga kiring</p>
                </div>
                <a href="{{ route('filament.client.auth.login') }}" class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold px-6 py-3 rounded-lg transition shadow-lg whitespace-nowrap">
                    Kirish
                </a>
            </div>
        @endauth

        <div class="space-y-4">
            @forelse ($comments as $comment)
                <div class="bg-white border-2 border-gray-100 rounded-xl p-6 hover:shadow-md transition">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-purple-500 flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold text-lg">
                                    {{ substr($comment->user->first_name, 0, 1) }}{{ substr($comment->user->last_name, 0, 1) }}
                                </span>
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="font-bold text-gray-900 text-lg">
                                    {{ $comment->user->name }}
                                </h3>
                                <time class="text-sm text-gray-500 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ $comment->created_at->diffForHumans() }}
                                </time>
                            </div>
                            <p class="text-gray-700 leading-relaxed mb-4 text-base">
                                {{ $comment->content }}
                            </p>
                            <div class="flex items-center gap-4 pt-3 border-t border-gray-100">
                                <button
                                    wire:click="toggleReaction({{ $comment->id }}, true)"
                                    class="flex items-center gap-2 px-4 py-2 rounded-lg font-medium transition {{ auth()->check() && $comment->userReaction(auth()->id())?->is_like ? 'bg-green-100 text-green-700 shadow-sm' : 'text-gray-600 hover:bg-green-50 hover:text-green-600' }}">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                                    </svg>
                                    <span class="font-semibold">{{ $comment->likes_count }}</span>
                                </button>
                                <button
                                    wire:click="toggleReaction({{ $comment->id }}, false)"
                                    class="flex items-center gap-2 px-4 py-2 rounded-lg font-medium transition {{ auth()->check() && $comment->userReaction(auth()->id()) && !$comment->userReaction(auth()->id())->is_like ? 'bg-red-100 text-red-700 shadow-sm' : 'text-gray-600 hover:bg-red-50 hover:text-red-600' }}">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M18 9.5a1.5 1.5 0 11-3 0v-6a1.5 1.5 0 013 0v6zM14 9.667v-5.43a2 2 0 00-1.105-1.79l-.05-.025A4 4 0 0011.055 2H5.64a2 2 0 00-1.962 1.608l-1.2 6A2 2 0 004.44 12H8v4a2 2 0 002 2 1 1 0 001-1v-.667a4 4 0 01.8-2.4l1.4-1.866a4 4 0 00.8-2.4z"/>
                                    </svg>
                                    <span class="font-semibold">{{ $comment->dislikes_count }}</span>
                                </button>
                                @if($comment->approvedReplies->count() > 0)
                                    <span class="text-sm text-gray-500 ml-auto flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/>
                                        </svg>
                                        {{ $comment->approvedReplies->count() }} javob
                                    </span>
                                @endif
                            </div>

                            <!-- Replies -->
                            @if($comment->approvedReplies->count() > 0)
                                <div class="mt-4 pl-6 border-l-2 border-blue-200 space-y-3">
                                    @foreach($comment->approvedReplies as $reply)
                                        <div class="bg-blue-50/50 rounded-lg p-4">
                                            <div class="flex items-start gap-3">
                                                <div class="flex-shrink-0">
                                                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-400 to-purple-400 flex items-center justify-center shadow">
                                                        <span class="text-white font-bold">
                                                            {{ substr($reply->user->first_name, 0, 1) }}{{ substr($reply->user->last_name, 0, 1) }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="flex items-center justify-between mb-1">
                                                        <h4 class="font-semibold text-gray-900 flex items-center gap-2">
                                                            {{ $reply->user->name }}
                                                            <span class="text-xs bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full">Bog'cha</span>
                                                        </h4>
                                                        <time class="text-xs text-gray-500">
                                                            {{ $reply->created_at->diffForHumans() }}
                                                        </time>
                                                    </div>
                                                    <p class="text-gray-700 text-sm">
                                                        {{ $reply->content }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-16 bg-gradient-to-br from-blue-50 to-purple-50 rounded-xl">
                    <svg class="w-20 h-20 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    <p class="text-gray-600 text-lg font-medium mb-2">Hali fikr-mulohaza yo'q</p>
                    <p class="text-gray-500">Birinchi bo'lib o'z fikrlaringiz bilan bo'lishing!</p>
                </div>
            @endforelse
        </div>

        @if($comments->hasPages())
            <div class="mt-8 pt-6 border-t border-gray-200">
                {{ $comments->links() }}
            </div>
        @endif
    </div>
</div>
