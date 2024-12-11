<?php

namespace App\Filament\Resources\InformasiPerpustakaanResource\Pages;

use App\Filament\Resources\InformasiPerpustakaanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInformasiPerpustakaan extends EditRecord
{
    protected static string $resource = InformasiPerpustakaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
