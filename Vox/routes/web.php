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
                ->can('interact', 'role')
                ->name('index');
            Route::post('/','store')
                ->can('interact', Role::class)
                ->name('store');
            Route::get('/{role}','show')
                ->can('interact', 'role')
                ->name('show');
            Route::patch('/{role}','update')
                ->can('interact', 'role')
                ->name('update');
            Route::delete('/{role}','destroy')
                ->can('interact', 'role')
                ->name('destroy');
        });

    //status
    Route::controller(StatusController::class)
        ->prefix('statuses')
        ->as('status.')
        ->group(function () {
            Route::get('/','index')
                ->can('interact', 'status')
                ->name('index');
            Route::post('/','store')
                ->can('interact', Status::class)
                ->name('store');
            Route::get('/{status}','show')
                ->can('interact', 'status')
                ->name('show');
            Route::patch('/{status}','update')
                ->can('interact', 'status')
                ->name('update');
            Route::delete('/{status}','destroy')
                ->can('interact', 'status')
                ->name('destroy');
    });

    //problem types
    Route::controller(ProblemTypeController::class)
        ->prefix('problem-types')
        ->as('problem-type.')
        ->group(function () {
            Route::get('/','index')
                ->can('interact', 'problemType')
                ->name('index');
            Route::post('/','store')
                ->can('interact', ProblemType::class)
                ->name('store');
            Route::get('/{problemType}','show')
                ->can('interact', 'problemType')
                ->name('show');
            Route::patch('/{problemType}','update')
                ->can('interact', 'problemType')
                ->name('update');
            Route::delete('/{problemType}','destroy')
                ->can('interact', 'problemType')
                ->name('destroy');
        });

    //departments
    Route::controller(DepartmentController::class)
        ->prefix('departments')
        ->as('departments.')
        ->group(function () {
           Route::get('/','index')
               ->can('interact', 'department')
               ->name('index');
           Route::post('/','store')
               ->can('interact', Department::class)
               ->name('store');
           Route::get('/{department}','show')
               ->can('interact', 'department')
               ->name('show');
           Route::patch('/{department}','update')
               ->can('interact', 'department')
               ->name('update');
           Route::delete('/{department}','destroy')
               ->can('interact', 'department')
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
                ->can('interact', 'specialization')
                ->name('show');
            Route::patch('/{specialization}','update')
                ->can('interact', 'specialization')
                ->name('update');
            Route::delete('/{specialization}','destroy')
                ->can('interact', 'specialization')
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
               ->can('viewAny', 'complaint')
               ->name('show');
           Route::patch('/{complaint}','update')
               ->can('update', 'complaint')
               ->name('update');
           Route::delete('/{complaint}','destroy')
               ->can('destroy', 'complaint')
               ->name('destroy');
        });

});


require __DIR__.'/auth.php';
