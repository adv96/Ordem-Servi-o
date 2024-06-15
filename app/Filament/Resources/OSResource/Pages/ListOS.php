<?php

namespace App\Filament\Resources\OSResource\Pages;

use App\Filament\Resources\OSResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOS extends ListRecords
{
    protected static string $resource = OSResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
