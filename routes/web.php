<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Models\News;

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    Route::get('news', function () {
        $news = News::query(); // Gunakan query builder, bukan News::all()

        // Pencarian berdasarkan judul
        if ($search = request('search')) {
            $news->where('title', 'like', '%' . $search . '%');
        }

        // Menyelesaikan query dan mengambil hasilnya
        $news = $news->get(); // Mendapatkan hasil query setelah filter

        // dd($news); // Debugging untuk melihat hasil query

        return view('News.index', [
            'news' => $news,
        ]);
    })->name('news.index');


    Route::get('news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('news', [NewsController::class, 'store'])->name('news.store');
    Route::get('news/{news:slug}', [NewsController::class, 'show'])->name('news.show');

    Route::get('profile/{username}', [UserController::class, 'show'])->name('user.show');

    Route::get('categories/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('categories', [CategoryController::class, 'store'])->name('category.store');
    Route::get('categories/{category:slug}', [CategoryController::class, 'show'])->name('category.show');

    Route::get('categories/{category:slug}/subcategories/create', [SubCategoryController::class, 'create'])->name('subcategory.create');
    Route::post('categories/{category:slug}/subcategories', [SubCategoryController::class, 'store'])->name('subcategory.store');
    Route::get('categories/{category:slug}/subcategories/{subcategory:slug}', [SubCategoryController::class, 'show'])->name('subcategory.show');

});

require __DIR__.'/auth.php';
