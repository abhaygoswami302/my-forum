<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\CommentsController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('forum', ForumController::class);
Route::post('reply/store/{id}', [ReplyController::class, 'store'])->name('reply.store');
Route::post('comment/store/{qid}/{rid}', [CommentsController::class, 'store'])->name('comment.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
