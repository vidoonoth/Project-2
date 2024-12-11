<?php

namespace App\Http\Controllers;
use App\Models\KoleksiBuku;
use Illuminate\Http\Request;

class KoleksiBukuController extends Controller
{
    public function index()
    {
        $koleksi = KoleksiBuku::all();
        return view('koleksiBuku', compact('koleksi'));
    }

    public function create(){
        return view('admin.dataKoleksiBuku');
    }

    public  function store(){
        
    }
}
