<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProblemTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\StatusController;
use App\Models\Complaint;
use App\Models\Department;
use App\Models\ProblemType;
use App\Models\Role;
use App\Models\Specialization;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;;

Route::get('/', function ()
{
    if (!Auth::check()) {
        return Inertia::render('Welcome');
    }
    return redirect()->route('dashboard');
});

Route::middleware(['auth', 'verified'])->group(function () {

    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::match(['patch', 'post'],'/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::get('/dashboard', fn () => Inertia::render('Dashboard'))
        ->name('dashboard');

    //roles
    Route::controller(RoleController::class)
        ->prefix('roles')
        ->as('role.')
        ->group(function () {
            Route::get('/','index')
                ->can('interact', Role::class)
                ->name('index');
            Route::post('/','store')
                ->can('interact', Role::class)
                ->name('store');
            Route::get('/{role}','show')
                ->can('interact', Role::class)
                ->name('show');
            Route::patch('/{role}','update')
                ->can('interact', Role::class)
                ->name('update');
            Route::delete('/{role}','destroy')
                ->can('interact', Role::class)
                ->name('destroy');
        });

    //status
    Route::controller(StatusController::class)
        ->prefix('statuses')
        ->as('status.')
        ->group(function () {
            Route::get('/','index')
                ->can('interact', Status::class)
                ->name('index');
            Route::post('/','store')
                ->can('interact', Status::class)
                ->name('store');
            Route::get('/{status}','show')
                ->can('interact', Status::class)
                ->name('show');
            Route::patch('/{status}','update')
                ->can('interact', Status::class)
                ->name('update');
            Route::delete('/{status}','destroy')
                ->can('interact', Status::class)
                ->name('destroy');
    });

    //problem types
    Route::controller(ProblemTypeController::class)
        ->prefix('problem-types')
        ->as('problem-type.')
        ->group(function () {
            Route::get('/','index')
                ->can('interact', ProblemType::class)
                ->name('index');
            Route::post('/','store')
                ->can('interact', ProblemType::class)
                ->name('store');
            Route::get('/{problemType}','show')
                ->can('interact', ProblemType::class)
                ->name('show');
            Route::patch('/{problemType}','update')
                ->can('interact', ProblemType::class)
                ->name('update');
            Route::delete('/{problemType}','destroy')
                ->can('interact', ProblemType::class)
                ->name('destroy');
        });

    //departments
    Route::controller(DepartmentController::class)
        ->prefix('departments')
        ->as('departments.')
        ->group(function () {
           Route::get('/','index')
               ->can('interact', Department::class)
               ->name('index');
           Route::post('/','store')
               ->can('interact', Department::class)
               ->name('store');
           Route::get('/{department}','show')
               ->can('interact', Department::class)
               ->name('show');
           Route::patch('/{department}','update')
               ->can('interact', Department::class)
               ->name('update');
           Route::delete('/{department}','destroy')
               ->can('interact', Department::class)
               ->name('destroy');
        });

    //specializations
    Route::controller(SpecializationController::class)
        ->prefix('specializations')
        ->as('specialization.')
        ->group(function () {
            Route::get('/','index')
                ->name('index');
            Route::post('/','store')
                ->can('interact', Specialization::class)
                ->name('store');
            Route::get('/{specialization}','show')
                ->can('interact', Specialization::class)
                ->name('show');
            Route::patch('/{specialization}','update')
                ->can('interact', Specialization::class)
                ->name('update');
            Route::delete('/{specialization}','destroy')
                ->can('interact', Specialization::class)
                ->name('destroy');
        });


    //complaints
    Route::controller(ComplaintController::class)
        ->prefix('complaints')
        ->as('complaints.')
        ->group(function () {
           Route::get('/','index')
               ->name('index');
           Route::post('/','store')
               ->can('create', Complaint::class)
               ->name('store');
           Route::get('/{complaint}','show')
               ->can('viewAny', Complaint::class)
               ->name('show');
           Route::patch('/{complaint}','update')
               ->can('update', Complaint::class)
               ->name('update');
           Route::delete('/{complaint}','destroy')
               ->can('destroy', Complaint::class)
               ->name('destroy');
        });

});


require __DIR__.'/auth.php';
