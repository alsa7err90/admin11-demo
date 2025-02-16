<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('locale/{locale}', function ($locale) {
    session(['locale' => $locale]);
    return redirect()->back();
})->name('locale');

require __DIR__.'/auth.php';
Route::post('/run-seeders', [HomeController::class, 'runSeeder'])->name('runSeeders') ;

Route::resource('languages', 'App\Http\Controllers\LanguageController');

Route::resource('tests', 'App\Http\Controllers\TesstCovtroller');