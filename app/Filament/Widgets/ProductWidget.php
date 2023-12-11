<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Widgets\ChartWidget;

class ProductWidget extends ChartWidget
{
    protected static ?string $heading = 'Our products in Categories';
    protected static ?int $sort = 4;
    protected function getData(): array
    {
        $teams = Product::select('category', 'id')
            ->get()
            ->groupBy(function ($team) {
                return $team->category;
            });
        $userCount = [];
        foreach ($teams as $team => $teamgroup) {
            $userCount[$team] = $teamgroup->count();
        }
        $labels = array_keys($userCount);
        $data = array_values($userCount);
        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Products',
                    'data' => $data,
                    'backgroundColor' =>  [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    'borderColor' =>  [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(153, 102, 255)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(201, 203, 207)'
                    ],
                    'borderWidth' =>  1
                ],

            ],

        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
