<?php

namespace App\Filament\Resources\KoleksiBukuResource\Pages;

use App\Filament\Resources\KoleksiBukuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKoleksiBuku extends EditRecord
{
    protected static string $resource = KoleksiBukuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
