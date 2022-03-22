<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ReplyController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('forum', ForumController::class);
Route::post('reply/store/{id}', [ReplyController::class, 'store'])->name('reply.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
