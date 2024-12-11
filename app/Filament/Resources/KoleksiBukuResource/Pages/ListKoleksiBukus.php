<?php

namespace App\Filament\Resources\KoleksiBukuResource\Pages;

use App\Filament\Resources\KoleksiBukuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKoleksiBukus extends ListRecords
{
    protected static string $resource = KoleksiBukuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTitle(): string //mengganti judul
    {
        return "Data Koleksi Buku";
    }
}
