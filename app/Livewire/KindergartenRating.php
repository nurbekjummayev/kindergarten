<?php

namespace App\Livewire;

use App\Models\Kindergarten;
use App\Models\KindergartenRating as KindergartenRatingModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class KindergartenRating extends Component
{
    public Kindergarten $kindergarten;

    public ?int $userRating = null;

    public float $averageRating = 0;

    public int $totalRatings = 0;

    public function mount(Kindergarten $kindergarten): void
    {
        $this->kindergarten = $kindergarten;
        $this->loadRatings();
    }

    public function loadRatings(): void
    {
        $this->averageRating = $this->kindergarten->averageRating();
        $this->totalRatings = $this->kindergarten->totalRatings();

        if (Auth::check()) {
            $this->userRating = $this->kindergarten->userRating(Auth::id());
        }
    }

    public function rate(int $rating): void
    {
        if (! Auth::check()) {
            $this->dispatch('notify', [
                'type' => 'error',
                'message' => 'Baholash uchun tizimga kiring',
            ]);

            return;
        }

        if ($rating < 1 || $rating > 5) {
            return;
        }

        KindergartenRatingModel::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'kindergarten_id' => $this->kindergarten->id,
            ],
            [
                'rating' => $rating,
            ]
        );

        $this->userRating = $rating;
        $this->loadRatings();

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Baholingiz saqlandi!',
        ]);
    }

    public function render()
    {
        return view('livewire.kindergarten-rating');
    }
}
