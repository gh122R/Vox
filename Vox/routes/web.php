<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatusController;
use App\Models\Role;
use App\Models\Status;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', fn () => Inertia::render('Welcome'));

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::get('/dashboard', fn () => Inertia::render('Dashboard'))
        ->name('dashboard');

    //roles
    Route::group(['as' => 'roles.'], function () {
        Route::get('/roles', [RoleController::class, 'index'])
            ->can('interact', Role::class)
            ->name('index');
        Route::post('/roles', [RoleController::class, 'store'])
            ->can('interact', Role::class)
            ->name('store');
        Route::patch('/roles/{role}', [RoleController::class, 'update'])
            ->can('interact', Role::class)
            ->name('update');
        Route::delete('/roles/{role}', [RoleController::class, 'destroy'])
            ->can('interact', Role::class)
            ->name('destroy');
    });

    //status
    Route::group(['as' => 'statuses.'], function () {
        Route::get('/statuses', [StatusController::class, 'index'])->can('interact', Status::class)
    });
});


require __DIR__.'/auth.php';
