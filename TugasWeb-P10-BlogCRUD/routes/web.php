<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('posts.index');
});

// route sampah harus di atas resource biar ga ketimpa posts/{post}
Route::get('/posts/sampah', [PostController::class, 'sampah'])->name('posts.sampah');
Route::patch('/posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
Route::delete('/posts/{id}/hapus-permanen', [PostController::class, 'hapusPermanen'])->name('posts.hapusPermanen');

Route::resource('posts', PostController::class);
