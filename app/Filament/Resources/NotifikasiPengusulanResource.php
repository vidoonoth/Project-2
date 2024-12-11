<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NotifikasiPengusulanResource\Pages;
use App\Filament\Resources\NotifikasiPengusulanResource\RelationManagers;
use App\Models\NotifikasiPengusulan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NotifikasiPengusulanResource extends Resource
{
    protected static ?string $model = NotifikasiPengusulan::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell';
    protected static ?string $navigationLabel = 'Notifikasi Pengusulan'; //mengganti nama sidebar

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Select::make('status')
                ->options([
                    'diterima' => 'diterima',
                    'ditolak' => 'ditolak',
                    'diproses' => 'diproses',
                    'tersedia' => 'tersedia',
                ])
                ->label('status'),
                Forms\Components\TextInput::make('isi')
                ->required()
                ->maxLength(255)
                ->label('Isi'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('status')
                ->searchable()
                ->label('Status'),
                Tables\Columns\TextColumn::make('isi')
                ->searchable()
                ->label('Isi'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNotifikasiPengusulans::route('/'),
            'create' => Pages\CreateNotifikasiPengusulan::route('/create'),
            'edit' => Pages\EditNotifikasiPengusulan::route('/{record}/edit'),
        ];
    }
}
