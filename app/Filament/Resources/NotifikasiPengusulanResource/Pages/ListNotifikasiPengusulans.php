<?php

namespace App\Filament\Resources\NotifikasiPengusulanResource\Pages;

use App\Filament\Resources\NotifikasiPengusulanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListNotifikasiPengusulans extends ListRecords
{
    protected static string $resource = NotifikasiPengusulanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTitle(): string //mengganti judul
    {
        return "Notifikasi Pengusulan";
    }
}
