<?php

namespace App\Filament\Widgets;

use App\Enums\KindergartenStatus;
use App\Models\Kindergarten;
use Filament\Widgets\ChartWidget;

class KindergartensChart extends ChartWidget
{
    protected ?string $heading = 'Bog\'chalar holati bo\'yicha';

    protected static ?int $sort = 2;

    public ?string $filter = 'status';

    protected function getData(): array
    {
        $activeFilter = $this->filter;

        if ($activeFilter === 'status') {
            // Status bo'yicha
            $draft = Kindergarten::where('status', KindergartenStatus::DRAFT)->count();
            $pending = Kindergarten::where('status', KindergartenStatus::PENDING)->count();
            $approved = Kindergarten::where('status', KindergartenStatus::APPROVED)->count();
            $rejected = Kindergarten::where('status', KindergartenStatus::REJECTED)->count();

            return [
                'datasets' => [
                    [
                        'label' => 'Bog\'chalar soni',
                        'data' => [$draft, $pending, $approved, $rejected],
                        'backgroundColor' => [
                            'rgb(156, 163, 175)', // gray for draft
                            'rgb(251, 191, 36)', // yellow for pending
                            'rgb(34, 197, 94)', // green for approved
                            'rgb(239, 68, 68)', // red for rejected
                        ],
                    ],
                ],
                'labels' => ['Qoralama', 'Kutilmoqda', 'Tasdiqlangan', 'Rad etilgan'],
            ];
        } else {
            // Publish holati bo'yicha
            $published = Kindergarten::where('is_published', true)->count();
            $unpublished = Kindergarten::where('is_published', false)
                ->where('status', KindergartenStatus::APPROVED)
                ->count();
            $waitingApproval = Kindergarten::whereIn('status', [
                KindergartenStatus::DRAFT,
                KindergartenStatus::PENDING,
            ])->count();

            return [
                'datasets' => [
                    [
                        'label' => 'Bog\'chalar soni',
                        'data' => [$published, $unpublished, $waitingApproval],
                        'backgroundColor' => [
                            'rgb(34, 197, 94)', // green for published
                            'rgb(59, 130, 246)', // blue for approved but not published
                            'rgb(251, 191, 36)', // yellow for waiting
                        ],
                    ],
                ],
                'labels' => ['Nashr qilingan', 'Nashr kutmoqda', 'Tasdiq kutmoqda'],
            ];
        }
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getFilters(): ?array
    {
        return [
            'status' => 'Holat bo\'yicha',
            'publish' => 'Nashr bo\'yicha',
        ];
    }
}
