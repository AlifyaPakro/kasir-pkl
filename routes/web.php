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