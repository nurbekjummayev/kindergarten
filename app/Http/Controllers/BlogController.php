<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $query = Blog::query()->published()->with('author');

        if (request()->filled('category')) {
            $query->where('category', request('category'));
        }

        if (request()->filled('search')) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%'.request('search').'%')
                    ->orWhere('excerpt', 'like', '%'.request('search').'%');
            });
        }

        $sortBy = request('sort_by', 'latest');
        match ($sortBy) {
            'popular' => $query->orderBy('views', 'desc'),
            'oldest' => $query->orderBy('published_at', 'asc'),
            default => $query->orderBy('published_at', 'desc'),
        };

        $blogs = $query->paginate(9)->withQueryString();

        return view('blog.index', compact('blogs'));
    }

    public function show(Blog $blog): View
    {
        if (! $blog->is_published || ($blog->published_at && $blog->published_at->isFuture())) {
            abort(404);
        }

        $blog->increment('views');

        $relatedBlogs = Blog::query()
            ->published()
            ->where('category', $blog->category)
            ->where('id', '!=', $blog->id)
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        return view('blog.show', compact('blog', 'relatedBlogs'));
    }
}
