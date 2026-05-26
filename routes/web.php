<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// Redirect utama
Route::get('/', function () {
    return redirect()->route('books.index');
});

// CRUD Buku
Route::resource('books', BookController::class);

// Profil Statis (Aman dari error database)
Route::get('/profile', function () {
    return view('profile');
});