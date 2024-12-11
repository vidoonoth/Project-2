<?php

namespace App\Filament\Resources\ContohResource\Pages;

use App\Filament\Resources\ContohResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContoh extends EditRecord
{
    protected static string $resource = ContohResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
