<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GraffitiController;
use App\Http\Controllers\Admin\IncidentController;
use App\Http\Controllers\Admin\InjuredController;
use App\Http\Controllers\Admin\MartyrController;
use App\Http\Controllers\Admin\MurdererController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

Route::redirect('/admin', '/dashboard');

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', fn() => view('dashboard'))->name('dashboard');

    Route::name('dashboard.')->group(function () {
        Route::get('/settings', [SettingController::class, 'form']);
        Route::put('/settings', [SettingController::class, 'save']);

        Route::resource('/martyrs', MartyrController::class);
        Route::resource('/injured', InjuredController::class);
        Route::resource('/murderers', MurdererController::class);
        Route::resource('/graffiti', GraffitiController::class)->parameters([
            'graffiti' => 'graffiti'
        ]);

        Route::resource('/incidents', IncidentController::class);
        Route::resource('/events', EventController::class);
        Route::resource('/banners', BannerController::class);
        Route::resource('/users', UserController::class);
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
