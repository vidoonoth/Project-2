<?php

use App\Http\Controllers\adminDashboard;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\UsulanController;
use App\Http\Controllers\KoleksiBukuController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\pengusulanController;
use App\Http\Controllers\InformasiController;
// use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Models\NotifikasiPengusulan;


Route::middleware('auth')->group(function () {
    // Route::resource('profile', ProfileController::class)->middleware('auth');
    Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/homePage', [BookController::class, 'koleksiBukuHome'])->name('homePage');                                                                
    Route::resource('pengusulan', pengusulanController::class)->middleware('auth');
    // route::get('/pengusulan', [pengusulanController::class, 'index'])->name('riwayatPengusulan');    
    Route::get('/dataPengusulan', [pengusulanController::class, 'dataPengusulan'])->name('dataPengusulan');
    Route::get('/dataPengusulan/{id}/edit', [PengusulanController::class, 'editDataPengusulan'])->name('editDataPengusulan');
    Route::get('/dataPengusulan/show', [PengusulanController::class, 'cetakPengusulan'])->name('cetakPengusulan');
    Route::put('/dataPengusulan/{id}', [PengusulanController::class, 'updateDataPengusulan'])->name('updateDataPengusulan');
    Route::delete('/dataPengusulan/{id}', [pengusulanController::class, 'hapusData'])->name('hapusDataPengusulan');

    Route::resource('notifikasi', NotifikasiController::class);
    Route::get('/notifikasiUser', [NotifikasiController::class, 'notifUser'])->name('notifikasiUser')->middleware('auth');
    Route::delete('/notifikasi/{id}', [NotifikasiController::class, 'hapusNotif'])->name('hapusNotifikasi');  

    Route::get('admin/dataKoleksiBuku', function () {
        return view('admin.dataKoleksiBuku');
    });
    Route::get('admin/dataInformasiPerpustakaan', function () {
        return view('admin.dataInformasiPerpustakaan'); //
    });
    Route::get('admin/notifikasiPengusulan', function () {
        return view('admin.notifikasiPengusulan');
    });

});

Route::get('/dashboard', [DashboardAdminController::class, 'index'])->middleware(['auth', 'admin'])
                                                                        ->name('dashboard');

                                                                                  



// Route::get('/dashboard', [DashboardAdminController::class, 'index'])->middleware(['auth', 'admin'])
// ->name('dashboard');
// Route::view('/dataPengusulan', 'admin.dataPengusulan')->name('dataPengusulan');

// Route::resource('dashboard', DashboardAdminController::class);
// Route::get('/riwayatPengusulan', [BookController::class, 'riwayatPengusulan`'])->name('pengusulan');
// Route::get('/{id}', [BookController::class, 'show'])->name('lihatBuku');

// Route::get('/', [AuthController::class, 'login']);

Route::resource('informasi', InformasiController::class);
Route::get('/sejarah', [InformasiController::class, 'sejarah'])
    ->name('sejarah')
    ->where('title', 'sejarah');
Route::get('/visiMisi', [InformasiController::class, 'visiMisi'])
    ->name('visiMisi')
    ->where('title', 'visi');
// Route::get('/riwayatPengusulan', [BookController::class, 'riwayatPengusulan`'])->name('pengusulan');
// Route::get('/{id}', [BookController::class, 'show'])->name('lihatBuku');



// Route::get('/pengusulan/search', [PengusulanController::class, 'cariPengusulan'])->name('cariPengusulan');



// Route::get('/{id}', [BookController::class, 'show'])->name('lihatBuku');

Route::resource('books', BookController::class);
Route::get('/koleksiBuku', [BookController::class, 'koleksiBuku'])->name('koleksiBuku');
// Route::get('/homePage', [BookController::class, 'rekomendasiBuku']);

// Route::get('/{id}', [BookController::class, 'show'])->name('lihatBuku');



// Route::get('/profil', function () {
//     return view('profil');
// });

Route::get('/', [BookController::class, 'koleksiBukuHome'])->name('home');
// Route::get('/', function () {
//     return view('homePage');
// });
// Route::get('/riwayatPengusulan', function () {
//     return view('riwayatPengusulan');
// });
// Route::get('/koleksiBuku', function () {
//     return view('koleksiBuku');
// });
// Route::get('/pengaturanAkun', function () {
//     return view('pengaturanAkun');
// });

// Route::get('/homePage', [HomePageController::class, 'index'])->middleware(['auth', 'verified'])->name('homePage');
// Route::get('/homePage', function () {
//     return view('homePage');
// })->middleware(['auth', 'verified'])->name('homePage');

// info
// Route::view('/HomePage', 'homePage')->name('homePage');
// Route::view('/sejarah', 'sejarah')->name('sejarah');
// Route::view('/visiMisi', 'visiMisi')->name('visiMisi');
Route::view('/denahPeta', 'denahPeta')->name('denahPeta');


// Route::view('/koleksiBuku', 'koleksiBuku')->name('koleksiBuku');





// Route::get('/homePage', [BooksController::class, 'index']);

// Route::get('admin/dashboard', [adminDashboard::class, 'index'])->
//     middleware(['auth', 'admin'])->name('admin.dashboard');

// Route::get('admin/dataPengusulan', function () {
//     return view('admin.dataPengusulan');
// });


require __DIR__.'/auth.php';
