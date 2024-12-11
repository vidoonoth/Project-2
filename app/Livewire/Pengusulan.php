<?php

namespace App\Livewire;

use Filament\Forms;
use Filament\Tables;
use App\Models\Usulan;

use Livewire\Component;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;

class Pengusulan extends Component implements HasForms
{
    use InteractsWithForms;
    public $bookTitle = '';
    public $genre = '';
    public $isbn = '';
    public $author = '';
    public $publicationYear = '';
    public $publisher = '';
    // public $date = '';
    // public $bookImage;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Card::make()
                //     ->schema([
                        Forms\Components\TextInput::make('bookTitle')
                        ->required()
                        ->maxLength(255)
                        ->label('Judul Buku')
                        ->placeholder('Masukkan judul buku di sini')
                        ->extraAttributes(['class' => '']),

                        Forms\Components\Select::make('genre')
                        ->extraAttributes(['class' => ''])
                        ->required()
                        ->options([
                            'fiksi' => 'fiksi',
                            'drama' => 'drama',
                            'romantis' => 'romantis',
                        ]),

                        Forms\Components\TextInput::make('isbn')
                        ->required()
                        ->maxLength(255)
                        ->label('Isbn')
                        // ->numeric()
                        ->rule('regex:/^\d{13}$/')
                        ->extraAttributes(['class' => '']),

                        Forms\Components\TextInput::make('author')
                        ->required()
                        ->maxLength(255)
                        ->label('Pengarang')
                        ->extraAttributes(['class' => ' ']),

                        Forms\Components\TextInput::make('publicationYear')
                        ->required()
                        ->label('Tahun Terbit')
                        // ->numeric()
                        ->extraAttributes(['class' => '']),

                        Forms\Components\TextInput::make('publisher')
                        ->required()
                        ->maxLength(255)
                        ->label('Penerbit')
                        ->extraAttributes(['class' => ' rounded-lg ']),

                        // Forms\Components\DatePicker::make('date')
                        // ->label('Tanggal')
                        // ->extraAttributes(['class' => '']),

                        // Forms\Components\FileUpload::make('bookImage')
                        // ->label('Gambar Buku')
                        // ->extraAttributes(['class' => 'rounded']),
                    ])
                    ->columns(2)
                    ->extraAttributes([
                        'class' => 'bg-slate-100 p-4 rounded-lg !important', // Ganti warna background
                    ]);
            // ]);
    }

    public function render()
    {
        return view('livewire.pengusulan');
    }
    public function save(): void{
        $data = $this->forms()->getState();
        // if($this->bookImage){
        //     $uploadFile = $this->bookImage;
        //     $fileName = time() . '-'. $uploadFile->getClientOriginalName();
        //     $path = $uploadFile->storeAs('public/bookImage');
        //     $data['bookImage'] = 'bookImage/' .$fileName;
        // }

        Usulan::insert($data);
        session()->flash('message', 'Berhasil');
    }
}
