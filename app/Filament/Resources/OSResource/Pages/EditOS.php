<?php

namespace App\Filament\Resources\OSResource\Pages;

use App\Filament\Resources\OSResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOS extends EditRecord
{
    protected static string $resource = OSResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
