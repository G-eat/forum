<?php

use App\Livewire\Post\Posts;
use App\Livewire\Post\ShowPost;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',             Posts::class)->name('post.index');
Route::get('/post/{id}',    ShowPost::class)->name('post.show');

Route::view('dashboard', 'profile.dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile.profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
