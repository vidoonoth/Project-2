<?php

namespace App\Filament\Resources\NotifikasiPengusulanResource\Pages;

use App\Filament\Resources\NotifikasiPengusulanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNotifikasiPengusulan extends EditRecord
{
    protected static string $resource = NotifikasiPengusulanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
