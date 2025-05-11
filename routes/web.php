<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('categories', 'categories')
    ->middleware(['auth', 'verified'])
    ->name('categories');

Route::view('news', 'news')
    ->middleware(['auth', 'verified'])
    ->name('news');

Route::view('about-us', 'about-us')
    ->middleware(['auth', 'verified'])
    ->name('about-us');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
