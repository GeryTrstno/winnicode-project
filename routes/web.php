<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('categories/{category:slug}', [CategoryController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('category');

Route::get('categories/{category:slug}/subcategories/{subcategory:slug}', [SubCategoryController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('subcategory');

Route::get('news/{news:slug}',[NewsController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('news');

// Route::view('news', 'news')
//     ->middleware(['auth', 'verified'])
//     ->name('news');

Route::view('list-of-news', 'list-of-news')
    ->middleware(['auth', 'verified'])
    ->name('list-of-news');

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
