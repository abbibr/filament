<?php

namespace App\Filament\Widgets;

use App\Enums\OrderStatusEnum;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    // over write refreshing the page in every 15second
    protected static ?string $pollingInterval = '15s';

    // disable widgets lazy loading
    protected static bool $isLazy = true;

    // will be second on the dashboard page
    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        return [
            // Dashboard Page Stats - numeric data in a visual chart
            Stat::make('Total Customers', Customer::count())
                ->description('Increase in customers')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 3, 4, 5, 6, 5, 3]),

            // Product Stats - numeric data in a visual chart
            Stat::make('Total Products', Product::count())
                ->description('Total products in app')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger')
                ->chart([7, 3, 4, 5, 6, 5, 3]),

            // Pending Orders - numeric data in a visual chart
            Stat::make('Pending Orders', Order::where('status', OrderStatusEnum::PENDING->value)->count())
                ->description('Total products in app')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger')
                ->chart([7, 3, 4, 5, 6, 5, 3]),
        ];
    }
}
