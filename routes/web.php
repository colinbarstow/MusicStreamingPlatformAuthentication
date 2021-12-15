<?php

use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\SetPasswordController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

$verificationLimiter = config('fortify.limiters.verification', '6,1');

Route::post('admin/users/store', [RegistrationController::class, '__invoke'])
    ->name('admin.users.store');

Route::get('/set-password/{id}/{hash}', [SetPasswordController::class, 'create'])
    ->middleware(['signed', 'throttle:'.$verificationLimiter])
    ->name('set-password');

Route::post('/set-password', [SetPasswordController::class, 'store'])
    ->middleware(['throttle:'.$verificationLimiter])
    ->name('set-password.store');
