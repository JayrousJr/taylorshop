<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Message;
use Filament\Widgets\ChartWidget;

class MessageWidget extends ChartWidget
{
    protected static ?string $heading = 'Total Messages';
    protected static ?int $sort = 5;
    protected function getData(): array
    {
        $messages = Message::select('created_at', 'id')->get()->groupBy(function ($message) {
            return Carbon::parse($message->created_at)->format('M');
        });
        $messageCount = [];
        foreach ($messages as $oneMessage => $messageGroup) {
            $messageCount[$oneMessage] = $messageGroup->count();
        }
        $labels = array_keys($messageCount);
        $data = array_values($messageCount);
        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'messages',
                    'data' => $data,
                    'fill' => [
                        'target' => 'origin',
                        'below' => 'rgba(54, 162, 235, 0.2)',
                        'above' => 'rgba(54, 162, 235, 0.2)',
                    ],
                    'borderColor' => 'rgba(54, 162, 235, 0.7)',
                    'tension' => 0.5,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
