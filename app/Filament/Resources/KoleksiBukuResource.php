<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\KoleksiBuku;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KoleksiBukuResource\Pages;
use App\Filament\Resources\KoleksiBukuResource\RelationManagers;

class KoleksiBukuResource extends Resource
{
    protected static ?string $model = KoleksiBuku::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open'; //mengganti icon sidebar
    protected static ?string $navigationLabel = 'Data Koleksi Buku'; //mengganti nama sidebar

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                Forms\Components\FileUpload::make('bookImage')
                    ->directory('bookImage'),
                Forms\Components\TextInput::make('bookTitle')
                ->required()
                ->minLength(1)
                ->maxLength(255)
                ->label('Judul Buku'),
                Forms\Components\Select::make('genre')
                ->options([
                    'fiksi' => 'fiksi',
                    'drama' => 'drama',
                    'romantis' => 'romantis',
                ]),
                Forms\Components\TextInput::make('isbn')
                ->required()
                ->maxLength(11)
                ->label('Isbn'),
                Forms\Components\TextInput::make('author')
                ->required()
                ->maxLength(255)
                ->label('Pengarang'),
                Forms\Components\TextInput::make('publicationYear')
                ->required()
                ->maxLength(4)
                ->label('Tahun Terbit'),
                Forms\Components\TextInput::make('publisher')
                ->required()
                ->maxLength(255)
                ->label('Penerbit'),
                Forms\Components\TextInput::make('description')
                ->required()
                ->maxLength(255)
                ->label('Deskripsi'),
                Forms\Components\TextInput::make('synopsis')
                ->required()
                ->maxLength(255)
                ->label('Sinopsis'),
                ])->columns('2')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\ImageColumn::make('bookImage')
                ->searchable()
                ->label('Gambar Buku'),
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
                Tables\Columns\TextColumn::make('description')
                ->searchable()
                ->label('Deskripsi'),
                Tables\Columns\TextColumn::make('synopsis')
                ->searchable()
                ->label('Sinopsis'),
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
            'index' => Pages\ListKoleksiBukus::route('/'),
            'create' => Pages\CreateKoleksiBuku::route('/create'),
            'edit' => Pages\EditKoleksiBuku::route('/{record}/edit'),
        ];
    }
}
