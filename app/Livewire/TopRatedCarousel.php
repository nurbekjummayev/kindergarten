<?php

namespace App\Livewire;

use App\Models\Kindergarten;
use Livewire\Component;

class TopRatedCarousel extends Component
{
    public $kindergartens;

    public function mount()
    {
        $this->kindergartens = Kindergarten::published()
            ->with(['organization', 'phones', 'ratings'])
            ->withAvg('ratings', 'rating')
            ->withCount('ratings')
            ->get()
            ->filter(fn($k) => $k->ratings_count >= 1)
            ->sortByDesc('ratings_avg_rating')
            ->take(8);
    }

    public function render()
    {
        return view('livewire.top-rated-carousel');
    }
}
