<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Kindergarten;
use App\Models\Organization;

class LandingController extends Controller
{
    public function index()
    {
        $statistics = [
            'total_kindergartens' => Kindergarten::published()->count(),
            'total_organizations' => Organization::where('is_active', true)->count(),
            'total_capacity' => Kindergarten::published()->sum('capacity'),
        ];

        $latestBlogs = Blog::query()
            ->published()
            ->with('author')
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        // Top rated kindergartens for carousel
        $topRatedKindergartens = Kindergarten::published()
            ->with(['organization', 'phones', 'ratings'])
            ->withAvg('ratings', 'rating')
            ->withCount('ratings')
            ->get()
            ->filter(fn($k) => $k->ratings_count >= 1)
            ->sortByDesc('ratings_avg_rating')
            ->take(8);

        $query = Kindergarten::published()
            ->with(['organization', 'kindergartenSocialNetworks.socialNetwork', 'phones', 'ratings', 'comments'])
            ->withCount(['ratings', 'comments']);

        // Search by name
        if (request()->filled('search')) {
            $query->where('name', 'like', '%'.request('search').'%');
        }

        // Filter by age range
        if (request()->filled('age_min') && request()->filled('age_max')) {
            $ageMin = request('age_min');
            $ageMax = request('age_max');
            $query->where('age_start', '<=', $ageMax)
                ->where('age_end', '>=', $ageMin);
        } elseif (request()->filled('age_min')) {
            $query->where('age_end', '>=', request('age_min'));
        } elseif (request()->filled('age_max')) {
            $query->where('age_start', '<=', request('age_max'));
        }

        // Filter by price range
        if (request()->filled('price_min')) {
            $query->where('monthly_fee_start', '>=', request('price_min'));
        }

        if (request()->filled('price_max')) {
            $query->where('monthly_fee_end', '<=', request('price_max'));
        }

        // Filter by minimum rating
        if (request()->filled('min_rating')) {
            $minRating = request('min_rating');
            $query->whereHas('ratings', function ($q) use ($minRating) {
                $q->havingRaw('AVG(rating) >= ?', [$minRating]);
            });
        }

        // Filter by type/category
        if (request()->filled('type')) {
            $query->where('type', request('type'));
        }

        // Sorting
        $sortBy = request('sort_by', 'newest');
        switch ($sortBy) {
            case 'rating':
                $query->withAvg('ratings', 'rating')
                    ->orderByDesc('ratings_avg_rating');
                break;
            case 'price_low':
                $query->orderBy('monthly_fee_start', 'asc');
                break;
            case 'price_high':
                $query->orderBy('monthly_fee_end', 'desc');
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            case 'newest':
            default:
                $query->latest('published_at');
                break;
        }

        $kindergartens = $query->paginate(12)->withQueryString();

        return view('landing', compact('statistics', 'kindergartens', 'latestBlogs', 'topRatedKindergartens'));
    }

    public function show(Kindergarten $kindergarten)
    {
        if (! $kindergarten->is_published || ! $kindergarten->status->isApproved()) {
            abort(404);
        }

        $kindergarten->load([
            'kindergartenSocialNetworks.socialNetwork',
            'workingHours',
            'phones',
            'organization',
        ]);

        return view('kindergarten-detail', compact('kindergarten'));
    }

    public function faq()
    {
        return view('faq');
    }
}
