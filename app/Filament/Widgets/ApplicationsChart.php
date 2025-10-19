<?php

namespace App\Filament\Widgets;

use App\Enums\ApplicationStatus;
use App\Models\Application;
use Filament\Widgets\ChartWidget;

class ApplicationsChart extends ChartWidget
{
    protected ?string $heading = 'Arizalar holati bo\'yicha';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $pending = Application::where('status', ApplicationStatus::PENDING)->count();
        $approved = Application::where('status', ApplicationStatus::APPROVED)->count();
        $rejected = Application::where('status', ApplicationStatus::REJECTED)->count();

        return [
            'datasets' => [
                [
                    'label' => 'Arizalar soni',
                    'data' => [$pending, $approved, $rejected],
                    'backgroundColor' => [
                        'rgb(251, 191, 36)', // yellow for pending
                        'rgb(34, 197, 94)', // green for approved
                        'rgb(239, 68, 68)', // red for rejected
                    ],
                ],
            ],
            'labels' => ['Kutilmoqda', 'Tasdiqlangan', 'Rad etilgan'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
