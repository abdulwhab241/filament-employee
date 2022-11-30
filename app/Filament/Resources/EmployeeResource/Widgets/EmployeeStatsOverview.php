<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Country;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $YEM = Country::Where('country_code', 'YEM')->WithCount('employees')->first();
        $US = Country::Where('country_code', 'US')->WithCount('employees')->first();
        return [
            Card::make('All Employees', Employee::all()->count()),
            Card::make($YEM->name.' Employees', $YEM->employees_count),
            Card::make($US->name.' Employees', $US->employees_count),
        ];
    }
}
