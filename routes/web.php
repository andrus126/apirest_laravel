<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SocialController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');
});

Route::get('/laboratorista', function () {
    return view('laboratorista.index');
});
Route::get('/laboratorista/create', function () {
    return view('laboratorista.create');
});
Route::get('auth/facebook',[SocialController::class, 'redirectFacebook']);
Route::get('auth/facebook/callback',[SocialController::class, 'callbackFacebook']);