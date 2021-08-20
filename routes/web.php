<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
   // return Inertia::render('Dashboard');
    return redirect('/dashboard/reports');
    
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->resource('/dashboard/user',UserController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/reports',[PagesController::class, 'reports'])->name('users.reports');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/users',[PagesController::class, 'users'])->name('users.listusers');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/newUser',[UserController::class, 'create'])->name('newUser');
Route::middleware(['auth:sanctum', 'verified'])->delete('/dashboard/destroy',[UserController::class, 'destroy'])->name('destroy');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/configuration',[PagesController::class, 'Configuration'])->name('users.configuration');

