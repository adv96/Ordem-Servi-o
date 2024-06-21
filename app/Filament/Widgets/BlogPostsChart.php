<?php

namespace App\Filament\Widgets;

use App\Models\OS;
use Filament\Widgets\ChartWidget;

class BlogPostsChart extends ChartWidget
{
    protected static ?string $heading = 'Ordem de Serviço'; // Update the heading as needed

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        // Fetch data from your OS model dynamically
        $osData = OS::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                     ->groupBy('month')
                     ->orderBy('month')
                     ->get();

        // Prepare data for chart datasets and labels
        $datasets = [
            [
                'label' => 'Número de Ordem de Serviços Creadas',
                'data' => $osData->pluck('count')->toArray(), // Extract 'count' values as an array
            ]
        ];

        $labels = $osData->pluck('month')->map(function ($month) {
            return date('M', mktime(0, 0, 0, $month, 1));
        })->toArray(); // Convert month number to month abbreviation (e.g., Jan, Feb, etc.)

        return [
            'datasets' => $datasets,
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Set the chart type (bar, line, pie, etc.)
    }
}
