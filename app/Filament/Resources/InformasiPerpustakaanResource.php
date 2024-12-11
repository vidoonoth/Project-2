<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InformasiPerpustakaanResource\Pages;
use App\Filament\Resources\InformasiPerpustakaanResource\RelationManagers;
use App\Models\InformasiPerpustakaan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InformasiPerpustakaanResource extends Resource
{
    protected static ?string $model = InformasiPerpustakaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationLabel = 'Data Informasi Perpustakaan';
    protected static ?string $getNavigationLabel = 'Data Informasi Perpustakaan';
    protected static ?string $getLabel = 'Data Informasi Perpustakaan';
    protected static ?string $getPluralLabel = 'Data Informasi Perpustakaan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('title')
                ->required()
                ->maxLength(255)
                ->label('Judul'),
                Forms\Components\TextInput::make('content')
                ->required()
                ->maxLength(255)
                ->label('Isi'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('title')
                ->searchable()
                ->label('Judul'),
                Tables\Columns\TextColumn::make('content')
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
            'index' => Pages\ListInformasiPerpustakaans::route('/'),
            'create' => Pages\CreateInformasiPerpustakaan::route('/create'),
            'edit' => Pages\EditInformasiPerpustakaan::route('/{record}/edit'),
        ];
    }
}
