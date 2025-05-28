<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProblemTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {

    //complaint - user interaction
    Route::get('/complaints', [ComplaintController::class, 'index'])
        ->name('index.complaint');

    Route::get('/complaints/create', [ComplaintController::class, 'create'])
        ->name('create.complaint');

    Route::post('/complaints', [ComplaintController::class, 'store'])
        ->name('store.complaint');

    Route::get('/complaints/{complaint}', [ComplaintController::class, 'show'])
        ->name('show.complaint')
        ->can('view', 'complaint');

    Route::get('/complaints/{complaint}/edit', [ComplaintController::class, 'edit'])
        ->name('edit.complaint')
        ->can('view', 'complaint');

    Route::patch('/complaints/{complaint}', [ComplaintController::class, 'update'])
        ->name('update.complaint')
        ->can('view', 'complaint');

    Route::delete('/complaints/{complaint}', [ComplaintController::class, 'destroy'])
        ->name('destroy.complaint')
        ->can('view', 'complaint');

    //statuses - moderator interaction
    Route::get('/statuses', [StatusController::class, 'index'])
        ->name('index.status')
        ->can('viewAny','status');

    Route::get('/statuses/create', [StatusController::class, 'create'])
        ->name('create.status')
        ->can('view', 'status');

    Route::post('/statuses', [StatusController::class, 'store'])
        ->name('store.status')
        ->can('create', 'status');

    Route::get('/statuses/{status}', [StatusController::class, 'show'])
        ->name('show.status')
        ->can('view', 'status');

    Route::get('/statuses/{status}/edit', [StatusController::class, 'edit'])
        ->name('edit.status')
        ->can('view', 'status');

    Route::patch('/statuses/{status}', [StatusController::class, 'update'])
        ->name('update.status')
        ->can('update', 'status');

    Route::delete('/statuses/{status}', [StatusController::class, 'destroy'])
        ->name('destroy.status')
        ->can('delete', 'status');

    //departments - moderator interaction
    Route::get('/departments', [DepartmentController::class, 'index'])
        ->name('index.department')
        ->can('viewAny','department');

    Route::get('/departments/create', [DepartmentController::class, 'create'])
        ->name('create.department')
        ->can('view','department');

    Route::post('/departments', [DepartmentController::class, 'store'])
        ->name('store.department')
        ->can('create', 'department');

    Route::get('/departments/{department}', [DepartmentController::class, 'show'])
        ->name('show.department')
        ->can('view', 'department');

    Route::get('/departments/{department}/edit', [DepartmentController::class, 'edit'])
        ->name('edit.department')
        ->can('view', 'department');

    Route::patch('/departments/{department}', [DepartmentController::class, 'update'])
        ->name('update.department')
        ->can('update', 'department');

    Route::delete('/departments/{department}', [DepartmentController::class, 'destroy'])
        ->name('destroy.department')
        ->can('delete', 'department');

    //problem types - moderator interaction
    Route::get('/problem-types', [ProblemTypeController::class, 'index'])
        ->name('index.problem-type')
        ->can('viewAny','problemType');

    Route::get('/problem-types/create', [ProblemTypeController::class, 'create'])
        ->name('create.problem-type')
        ->can('view','problemType');

    Route::post('/problem-types', [ProblemTypeController::class, 'store'])
        ->name('store.problem-type')
        ->can('create', 'problemType');

    Route::get('/problem-types/{problemType}', [ProblemTypeController::class, 'show'])
        ->name('show.problem-type')
        ->can('view', 'problemType');

    Route::get('/problem-types/{problemType}/edit', [ProblemTypeController::class, 'edit'])
        ->name('edit.problem-type')
        ->can('view', 'problemType');

    Route::patch('/problem-types/{problemType}', [ProblemTypeController::class, 'update'])
        ->name('update.problem-type')
        ->can('update', 'problemType');

    Route::delete('/problem-types/{problemType}', [ProblemTypeController::class, 'destroy'])
        ->name('destroy.problem-type')
        ->can('delete', 'problemType');

    //role - moderator interaction
    Route::get('/roles', [RoleController::class, 'index'])
        ->name('index.role')
        ->can('viewAny','role');

    Route::get('/roles/create', [RoleController::class, 'create'])
        ->name('create.role')
        ->can('view','role');

    Route::post('/roles', [RoleController::class, 'store'])
        ->name('store.role')
        ->can('create', 'role');

    Route::get('/roles/{role}', [RoleController::class, 'show'])
        ->name('show.role')
        ->can('view', 'role');

    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])
        ->name('edit.role')
        ->can('view', 'role');

    Route::patch('/roles/{role}', [RoleController::class, 'update'])
        ->name('update.role')
        ->can('update', 'role');

    Route::delete('/roles/{role}', [RoleController::class, 'destroy'])
        ->name('destroy.role')
        ->can('delete', 'role');

    //user - settings and other
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';
