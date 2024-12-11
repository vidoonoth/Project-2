<?php

namespace App\Filament\Resources\InformasiPerpustakaanResource\Pages;

use App\Filament\Resources\InformasiPerpustakaanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInformasiPerpustakaans extends ListRecords
{
    protected static string $resource = InformasiPerpustakaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTitle(): string //mengganti judul
    {
        return "Data Informasi Perpustakaan";
    }
    public static function getLabel(): string
    {
        return 'Informasi Perpustakaan';
    }
    public static function getPluralLabel(): string
    {
        return 'Informasi Perpustakaan';
    }
}
