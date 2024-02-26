<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('log.home.visit');
Route::get('/google/redirect', [App\Http\Controllers\Auth\GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [App\Http\Controllers\Auth\GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');

Auth::routes();

// Auth middleware for authenticated users
Route::middleware(['auth'])->group(function () {
//    Route::get('roles', [App\Http\Controllers\RoleController::class, 'index'])->name('role.index')->middleware(['role:admin']);
//    Route::get('roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('role.create')->middleware(['role:admin']);
//    Route::post('roles/store', [App\Http\Controllers\RoleController::class, 'store'])->name('role.store')->middleware(['role:admin']);
//    Route::get('roles/{id}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('role.edit')->middleware(['role:admin']);
//    Route::put('roles/{id}/update', [App\Http\Controllers\RoleController::class, 'update'])->name('role.update')->middleware(['role:admin']);
//    Route::post('roles/{id}/destroy', [App\Http\Controllers\RoleController::class, 'destroy'])->name('role.destroy')->middleware(['role:admin']);
//    Route::post('roles/{id}/delete', [App\Http\Controllers\RoleController::class, 'forceDelete'])->name('role.forceDelete')->middleware(['role:admin']);
//    Route::get('roles/{id}/retrieve', [App\Http\Controllers\RoleController::class, 'retrieveDeleted'])->name('role.retrieveDeleted')->middleware(['role:admin']);


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['role:admin']);
    Route::post('/dashboard/guestvisitbydate', [DashboardController::class, 'getguestvisitbydate'])->name('dashboard.getguestbydate')->middleware(['role:admin']);
    Route::post('/dashboard/uservisitbydate', [DashboardController::class, 'getuservisitbydate'])->name('getuservisitbydate')->middleware(['role:admin']);

    Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('user.index')->middleware(['role:admin']);
    Route::get('users/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create')->middleware(['role:admin']);
    Route::post('users/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store')->middleware(['role:admin']);
    Route::get('users/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::put('users/{id}/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::put('users/{id}/change-password', [App\Http\Controllers\UserController::class, 'changeUserPassword'])->name('user.change-pass');
    Route::get('users/{id}/view', [App\Http\Controllers\UserController::class, 'view'])->name('user.view');
    Route::post('users/{id}/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy')->middleware(['role:admin']);
    Route::post('users/{id}/delete', [App\Http\Controllers\UserController::class, 'forceDelete'])->name('user.forceDelete')->middleware(['role:admin']);
    Route::get('users/{id}/retrieve', [App\Http\Controllers\UserController::class, 'retrieveDeleted'])->name('user.retrieveDeleted')->middleware(['role:admin']);

    Route::get('categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('category.index')->middleware(['auth']);
    Route::get('categories/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('category.create')->middleware(['auth']);
    Route::get('categories/{id}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit')->middleware(['auth']);
    Route::post('categories/store', [\App\Http\Controllers\CategoryController::class, 'store'])->name('category.store')->middleware(['auth']);
    Route::post('categories/{id}/update', [\App\Http\Controllers\CategoryController::class, 'update'])->name('category.update')->middleware(['auth']);
    Route::post('categories/{id}/destroy', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy')->middleware(['auth']);

    Route::post('notes/show', [\App\Http\Controllers\NoteController::class, 'show'])->name('notes.show');
    Route::post('notes/store', [\App\Http\Controllers\NoteController::class, 'store'])->name('notes.store');
    Route::post('notes/update', [\App\Http\Controllers\NoteController::class, 'update'])->name('notes.update');
    Route::post('notes/destroy', [\App\Http\Controllers\NoteController::class, 'destroy'])->name('notes.destroy');

});

