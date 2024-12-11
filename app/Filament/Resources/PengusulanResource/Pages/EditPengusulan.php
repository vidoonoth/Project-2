<?php

namespace App\Filament\Resources\PengusulanResource\Pages;

use App\Filament\Resources\PengusulanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPengusulan extends EditRecord
{
    protected static string $resource = PengusulanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
