<?php

namespace App\Filament\Widgets;

use App\Models\OS;
use App\Models\Servico;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Facades\DB;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalPatrocinios = OS::join('servicos', 'o_s.servico_id', '=', 'servicos.id')
        ->select(DB::raw('SUM(servicos.valor * o_s.quantidade) as total'))
        ->value('total');

        return [
            Stat::make('Usuário', User::count())
            ->description('Usuários cadastrados')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
            Stat::make('Serviços',Servico::count())
            ->description('Serviços cadastrados')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
            Card::make('Ordem de Serviços R$', $totalPatrocinios)
            ->description('Total de Ordem de Serviços')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([15, 4, 10, 2, 12, 4, 12])
            ->color('success'),
        ];
    }
}
