<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProblemTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatusController;
use App\Models\ProblemType;
use App\Models\Role;
use App\Models\Status;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', fn () => Inertia::render('Welcome'));

Route::middleware('auth')->group(function () {

    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::get('/dashboard', fn () => Inertia::render('Dashboard'))
        ->name('dashboard');

    //roles

    Route::controller(RoleController::class)
        ->prefix('roles')
        ->as('role.')
        ->can('interact', Role::class)
        ->group(function () {
            Route::get('/', [RoleController::class, 'index'])
                ->name('index');
            Route::post('/', [RoleController::class, 'store'])
                ->name('store');
            Route::get('/{role}', [RoleController::class, 'show'])
                ->name('show');
            Route::patch('/{role}', [RoleController::class, 'update'])
                ->name('update');
            Route::delete('/{role}', [RoleController::class, 'destroy'])
                ->name('destroy');
        });

    //status
    Route::controller(StatusController::class)
        ->prefix('statuses')
        ->as('status.')
        ->can('interact', Status::class)
        ->group(function () {
            Route::get('/','index')
                ->name('index');
            Route::post('/','store')
                ->name('store');
            Route::get('/{status}','show')
                ->name('show');
            Route::patch('/{status}','update')
                ->name('update');
            Route::delete('/{status}','destroy')
                ->name('destroy');
    });

    //problem types
    Route::controller(ProblemTypeController::class)
        ->prefix('problem-types')
        ->as('problem-type.')
        ->can('interact', ProblemType::class)
        ->group(function () {
            Route::get('/','index')
                ->name('index');
            Route::post('/','store')
                ->name('store');
            Route::get('/{problemType}','show')
                ->name('show');
            Route::patch('/{problemType}','update')
                ->name('update');
            Route::delete('/{problemType}','destroy')
                ->name('destroy');
        });

    //departments
    Route::controller(DepartmentController::class)
        ->prefix('departments')
        ->as('departments.')
        ->group(function () {
           Route::get('/','index')
               ->name('index');
           Route::post('/','store')
               ->name('store');
           Route::get('/{department}','show')
               ->name('show');
           Route::patch('/{department}','update')
               ->name('update');
           Route::delete('/{department}','destroy')
               ->name('destroy');
        });
});


require __DIR__.'/auth.php';
