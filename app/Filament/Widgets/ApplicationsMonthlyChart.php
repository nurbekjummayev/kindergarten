<?php

namespace App\Filament\Widgets;

use App\Enums\ApplicationStatus;
use App\Models\Application;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class ApplicationsMonthlyChart extends ChartWidget
{
    protected ?string $heading = 'Oylik arizalar statistikasi';

    protected static ?int $sort = 5;

    protected function getData(): array
    {
        $data = [
            'pending' => [],
            'approved' => [],
            'rejected' => [],
        ];
        $labels = [];

        // So'nggi 6 oy
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);

            $pending = Application::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->where('status', ApplicationStatus::PENDING)
                ->count();

            $approved = Application::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->where('status', ApplicationStatus::APPROVED)
                ->count();

            $rejected = Application::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->where('status', ApplicationStatus::REJECTED)
                ->count();

            $data['pending'][] = $pending;
            $data['approved'][] = $approved;
            $data['rejected'][] = $rejected;
            $labels[] = $date->format('M Y');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Kutilmoqda',
                    'data' => $data['pending'],
                    'borderColor' => 'rgb(251, 191, 36)',
                    'backgroundColor' => 'rgba(251, 191, 36, 0.1)',
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
                [
                    'label' => 'Rad etilgan',
                    'data' => $data['rejected'],
                    'borderColor' => 'rgb(239, 68, 68)',
                    'backgroundColor' => 'rgba(239, 68, 68, 0.1)',
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
