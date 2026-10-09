<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;

// Mengalihkan halaman utama (/) langsung ke halaman daftar buku
Route::get('/', function () {
    return redirect()->route('books.index');
});

// Resource Routing untuk Kategori dan Buku
Route::resource('categories', CategoryController::class);
Route::resource('books', BookController::class);