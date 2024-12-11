<?php

namespace App\Filament\Resources\PengusulanResource\Pages;

use App\Filament\Resources\PengusulanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPengusulans extends ListRecords
{
    protected static string $resource = PengusulanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTitle(): string //mengganti judul
    {
        return "Data Pengusulan";
    }
}
