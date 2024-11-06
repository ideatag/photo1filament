<?php

namespace App\Filament\Widgets;

use App\Models\Album;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class AlbumStats extends BaseWidget
{
    protected function getStats(): array
    {
        $albumCount = Album::where('user_id', Auth::id())->count();

        return [
            Stat::make('Number of Albums', $albumCount),
        ];
    }
}
