<?php

namespace App\View\Components;

use Illuminate\View\Component;

class card extends Component
{
    public $bookImage;
    public $bookTitle;
    public $isbn;
    public $genre;
    public $author;
    public $yearPublication;
    public $publisher;
    public $description;
    public $synopsis;

    public function __construct($bookImage, $bookTitle, $isbn, $genre, $author, $yearPublication, $publisher, $description)
    {
        $this->bookImage = $bookImage;
        $this->bookTitle = $bookTitle;
        $this->isbn = $isbn;
        $this->genre = $genre;
        $this->author = $author;
        $this->yearPublication = $yearPublication;
        $this->publisher = $publisher;
        $this->description = $description;
        // $this->synopsis = $synopsis;
    }

    public function render()
    {
        return view('components.card');
    }
}
