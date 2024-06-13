<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'users', 'as' => 'users.', 'middleware' => ['auth']], function () {
    Route::get('/index', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create')->middleware(['permission:create user']);
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit')->middleware(['permission:edit user']);
    Route::put('/update/{user}', [UserController::class, 'update'])->name('update');
    Route::get('/show/{user}', [UserController::class, 'show'])->name('show');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy')->middleware(['permission:delete user']);
});


Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
})->name('dashboard');

Route::middleware(['auth'])->group(function () {

    // Routes chính của Profile
    Route::prefix('profiles')->as('profiles.')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::get('/create', [ProfileController::class, 'create'])->name('create');
        Route::post('/', [ProfileController::class, 'store'])->name('store');
        Route::get('/{profile}', [ProfileController::class, 'show'])->name('show');
        Route::get('/{profile}/edit', [ProfileController::class, 'edit'])->name('edit');
        Route::put('/{profile}', [ProfileController::class, 'update'])->name('update');
        Route::delete('/{profile}', [ProfileController::class, 'destroy'])->name('destroy');

        Route::put('/teacherAUpdateProfile/{profile}', [ProfileController::class, 'updateStatus'])->name('updateStatus');
        Route::put('/teacherBUpdateProfile/{profile}', [ProfileController::class, 'updateStatusB'])->name('updateStatusB');
        Route::post('/{profile}/submit-to-teacher-a', [ProfileController::class, 'submitToTeacherA'])->name('submitToTeacherA');
        Route::post('/{profile}/submit-to-teacher-b', [ProfileController::class, 'submitToTeacherB'])->name('submitToTeacherB');
        Route::post('/{profile}/confirm-by-teacher-b', [ProfileController::class, 'confirmByTeacherB'])->name('confirmByTeacherB');
        Route::post('/{profile}/approveByA', [ProfileController::class, 'approveByA'])->name('approveByA');
        Route::post('/{profile}/rejectByA', [ProfileController::class, 'rejectByA'])->name('rejectByA');
        Route::post('/{profile}/approveByB', [ProfileController::class, 'approveByB'])->name('approveByB');
        Route::post('/{profile}/rejectByB', [ProfileController::class, 'rejectByB'])->name('rejectByB');
    });

    // Route cho giáo viên A
    Route::prefix('teacher-a')->as('profiles.')->group(function () {
        Route::get('/profiles', [ProfileController::class, 'teacherAIndex'])->name('teacherAIndex');
        Route::get('/profiles/{profile}', [ProfileController::class, 'teacherAReview'])->name('teacherAReview');
    });

    // Route cho giáo viên B
    Route::prefix('teacher-b')->as('profiles.')->group(function () {
        Route::get('/profiles', [ProfileController::class, 'teacherBIndex'])->name('teacherBIndex');
        Route::get('/profiles/{profile}', [ProfileController::class, 'teacherBReview'])->name('teacherBReview');
    });
});

// Authentication Routes
Auth::routes();
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Home Route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
