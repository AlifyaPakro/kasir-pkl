<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KatalogController;

Route::get('/',
    [KatalogController::class, 'index']
);

Route::get('/katalog',
    [KatalogController::class, 'index']
)->name('katalog.index');

Route::get('/katalog/{id}',
    [KatalogController::class, 'show']
)->whereNumber('id')
 ->name('katalog.show');

Route::get('/katalog/pencarian', 
    [KatalogController::class, 'pencarian']
)->name('katalog.pencarian');

Route::get('/katalog/nonaktif',
    [KatalogController::class, 'nonaktifIndex']
)->name('katalog.nonaktif');

Route::patch('/katalog/{id}/nonaktif',
    [KatalogController::class, 'nonaktifToggle']
)->name('katalog.nonaktif.toggle');
Route::get('/katalog/tambah',
    [KatalogController::class, 'tambahIndex']
)->name('katalog.tambah');

Route::post('/katalog/tambah',
    [KatalogController::class, 'tambahStore']
)->name('katalog.tambah.store');
Route::get('/katalog/update',
    [KatalogController::class, 'updateIndex']
)->name('katalog.update');

Route::put('/katalog/{id}/update',
    [KatalogController::class, 'updateStore']
)->name('katalog.update.store');
