<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/*Route::put('/user/profile-information', [ProfileInformationController::class, 'update'])
            ->middleware(['auth:'.config('fortify.guard')])
            ->name('user-profile-information.update');
*/



//Route::middleware(['auth:'.config('fortify.guard')])->post('/newUser',[UserController::class, 'create'])->name('newUser');

