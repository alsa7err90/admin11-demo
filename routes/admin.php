<?php

// routes/Admin.php

use App\Http\Controllers\Admin\ArchiveController;
use App\Http\Controllers\Admin\ComponentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GeneratorController;
use App\Http\Controllers\Admin\HelpFuncController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\PageGeneratorController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RelationshipAnalysisController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\UserController;

Route::middleware(['auth', 'role:admin|editor'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('posts', PostController::class);
    Route::resource('components', ComponentController::class);
    Route::resource('help-funcs', HelpFuncController::class);


    Route::get('/builder', [PageGeneratorController::class, 'create'])->name('builder.create');
    Route::post('/builder', [PageGeneratorController::class, 'store'])->name('builder.store');

    Route::get('/archive/create', [ArchiveController::class, 'create'])->name('archive.create');
    Route::post('/archive', [ArchiveController::class, 'store'])->name('archive.store');

    Route::prefix('relationships')->group(function () {
        Route::get('/', [RelationshipAnalysisController::class, 'index'])->name('relationships.index');
    });

    Route::resource('heroes', HeroController::class);
    Route::post('heroes/{hero}/toggle-status', [HeroController::class, 'toggleStatus'])->name('heroes.toggleStatus');

    Route::prefix('tickets')->name('tickets.')->group(function () {
        Route::get('/', [TicketController::class, 'index'])->name('index');
        Route::get('/create', [TicketController::class, 'create'])->name('create');
        Route::post('/', [TicketController::class, 'store'])->name('store');
        Route::get('/{id}', [TicketController::class, 'show'])->name('show');

        Route::post('/{id}/comments', [TicketController::class, 'addComment'])->name('addComment');

        Route::PUT('/{id}/status', [TicketController::class, 'updateStatus'])->name('updateStatus');
        Route::PUT('/{id}/assign', [TicketController::class, 'assignAdmin'])->name('assignAdmin');
    });
});

Route::resource('languages', 'App\Http\Controllers\Admin\LanguageController');

Route::post('languages/{language}/set-default', [LanguageController::class, 'setDefault'])->name('languages.setDefault');
Route::post('languages/{language}/fetch-translations', [LanguageController::class, 'fetchTranslations'])->name('languages.fetchTranslations');
Route::post('/admin/languages/{language}/translations', [LanguageController::class, 'storeTranslation'])->name('languages.storeTranslation');
