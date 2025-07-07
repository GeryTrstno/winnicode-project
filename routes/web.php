<?php

use App\Http\Controllers\CategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('categories/{category:slug}', [CategoryController::class, 'show'])
    ->where('category', '[A-Za-z0-9\-]+')
    ->middleware(['auth', 'verified'])
    ->name('category');

Route::view('list-of-news', 'list-of-news')
    ->middleware(['auth', 'verified'])
    ->name('list-of-news');

Route::view('news', 'news')
    ->middleware(['auth', 'verified'])
    ->name('news');

Route::view('about-us', 'about-us')
    ->middleware(['auth', 'verified'])
    ->name('about-us');

Route::view(('profile'), 'profile')
    ->middleware(['auth', 'verified'])
    ->name('profile');

Route::middleware(['auth'])->group(function () {

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
