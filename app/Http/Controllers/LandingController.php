<?php

namespace App\Http\Controllers;

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

        $kindergartens = Kindergarten::published()
            ->with(['organization', 'kindergartenSocialNetworks.socialNetwork', 'phones'])
            ->latest('published_at')
            ->paginate(12);

        return view('landing', compact('statistics', 'kindergartens'));
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
}
