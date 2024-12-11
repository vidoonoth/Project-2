<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengusulanResource\Pages;
use App\Filament\Resources\PengusulanResource\RelationManagers;
use App\Models\Pengusulan;
use App\Models\pengusulanModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengusulanResource extends Resource
{
    protected static ?string $model = pengusulan::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';
    protected static ?string $navigationLabel = 'Data Pengusulan'; //mengganti nama sidebar

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('status')
                ->required()
                ->maxLength(255)
                ->label('Status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                // Tables\Columns\TextColumn::make('username')
                // ->searchable()
                // ->label('Username'),
                Tables\Columns\TextColumn::make('bookTitle')
                ->searchable()
                ->label('Judul Buku'),
                Tables\Columns\TextColumn::make('genre')
                ->searchable()
                ->label('Kategori'),
                Tables\Columns\TextColumn::make('isbn')
                ->searchable()
                ->label('Isbn'),
                Tables\Columns\TextColumn::make('author')
                ->searchable()
                ->label('Pengarang'),
                Tables\Columns\TextColumn::make('publicationYear')
                ->searchable()
                ->label('Tahun Terbit'),
                Tables\Columns\TextColumn::make('publisher')
                ->searchable()
                ->label('Penerbit'),
                Tables\Columns\TextColumn::make('status')
                ->searchable()
                ->label('Status'),
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
            'index' => Pages\ListPengusulans::route('/'),
            'create' => Pages\CreatePengusulan::route('/create'),
            'edit' => Pages\EditPengusulan::route('/{record}/edit'),
        ];
    }
}
