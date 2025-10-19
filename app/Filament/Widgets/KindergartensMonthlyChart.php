<?php

namespace App\Filament\Widgets;

use App\Enums\KindergartenStatus;
use App\Models\Kindergarten;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class KindergartensMonthlyChart extends ChartWidget
{
    protected ?string $heading = 'Oylik bog\'chalar qo\'shilishi';

    protected static ?int $sort = 4;

    protected function getData(): array
    {
        $data = [];
        $labels = [];

        // So'nggi 6 oy
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);

            $total = Kindergarten::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();

            $approved = Kindergarten::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->where('status', KindergartenStatus::APPROVED)
                ->count();

            $data['total'][] = $total;
            $data['approved'][] = $approved;
            $labels[] = $date->format('M Y');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jami qo\'shilgan',
                    'data' => $data['total'],
                    'borderColor' => 'rgb(59, 130, 246)',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                    'fill' => true,
                    'tension' => 0.4,
                ],
                [
                    'label' => 'Tasdiqlangan',
                    'data' => $data['approved'],
                    'borderColor' => 'rgb(34, 197, 94)',
                    'backgroundColor' => 'rgba(34, 197, 94, 0.1)',
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
