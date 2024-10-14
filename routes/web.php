<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', \App\Livewire\Post\Index::class)->name('post.index');
Route::get('/create', \App\Livewire\Post\Create::class)->name('post.create');
Route::get('/edit/{id}', \App\Livewire\Post\Edit::class)->name('post.edit');
