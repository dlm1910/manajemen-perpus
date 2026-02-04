<?php


/*
|--------------------------------------------------------------------------
| HALAMAN AWAL
|--------------------------------------------------------------------------
*/
//Route::get('/', function () {
//    return redirect('/login');
//});



//Route::get('/dashboard', [DashboardController::class, 'index'])
//    ->middleware('auth')
//    ->name('dashboard');


//Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
//    ->name('logout');
// tampilkan form login
//Route::get('/login', [AuthenticatedSessionController::class, 'create'])
//    ->name('login');

// proses login (POST)
//Route::post('/login', [AuthenticatedSessionController::class, 'store']);



//Route::middleware('auth')->group(function () {

    // ADMIN & ANGGOTA
    // =========================

//    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');

// ⚠️ CREATE HARUS DI ATAS
//Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');

//Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');

// SHOW PALING BAWAH
//Route::get('/buku/{buku}', [BukuController::class, 'show'])->name('buku.show');

//    Route::middleware('role:admin')->group(function () {

        // BUKU (CRUD)
 //       Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
   //     Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
   //     Route::get('/buku/{buku}/edit', [BukuController::class, 'edit'])->name('buku.edit');
   //     Route::put('/buku/{buku}', [BukuController::class, 'update'])->name('buku.update');
   //     Route::delete('/buku/{buku}', [BukuController::class, 'destroy'])->name('buku.destroy');

        // KATEGORI
    //    Route::resource('kategori', KategoriController::class);

        // ANGGOTA
    //    Route::resource('anggota', AnggotaController::class);

        // PEMINJAMAN
   //     Route::resource('peminjaman', PeminjamanController::class);
   // });
//});


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    BukuController,
    KategoriController,
    AnggotaController,
    PeminjamanController
};
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Halaman Awal

Route::get('/', function () {
    // Menampilkan halaman welcome, bukan melempar ke login
    return view('welcome'); 
});

// Auth Routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// TAMBAHKAN INI: Rute untuk Register
Route::get('/register', [App\Http\Controllers\Auth\RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisteredUserController::class, 'store']);

Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route Peminjaman yang bisa diakses Admin DAN Anggota
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');

    // KHUSUS ADMIN
    Route::middleware('role:admin')->group(function () {
        Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
        Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
        Route::get('/buku/{buku}/edit', [BukuController::class, 'edit'])->name('buku.edit');
        Route::put('/buku/{buku}', [BukuController::class, 'update'])->name('buku.update');
        Route::delete('/buku/{buku}', [BukuController::class, 'destroy'])->name('buku.destroy');

        Route::resource('kategori', KategoriController::class);
        Route::resource('anggota', AnggotaController::class);
        
        // Resource peminjaman kecuali 'index' karena sudah didefinisikan di luar untuk akses bersama
        Route::resource('peminjaman', PeminjamanController::class)->except(['index']);
    });

    // AKSES BERSAMA (Buku)
    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::get('/buku/{buku}', [BukuController::class, 'show'])->name('buku.show');
});
