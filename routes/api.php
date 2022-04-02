<?php

//use App\Http\Controllers\Api\LaboratoristaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LaboratoristaController;
use App\Http\Controllers\Api\SocialController;

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::group (['middleware' => ["auth:sanctum"]], function(){
    //rutas auth
    Route::get('user-profile', [UserController::class, 'userProfile']);
    Route::get('logout', [UserController::class, 'logout']);
    //rutas laboratorista
    Route::post("create-laboratorista", [LaboratoristaController::class, "createLaboratorista"]);
    Route::get("list-laboratorista", [LaboratoristaController::class, "listLaboratorista"]);
    Route::get("show-laboratorista/{id}", [LaboratoristaController::class, "showLaboratorista"]);
    
    Route::put("update-laboratorista/{id}", [LaboratoristaController::class, "updateLaboratorista"]);
    Route::delete("delete-laboratorista/{id}", [LaboratoristaController::class, "deleteLaboratorista"]);
    
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('auth/facebook',[SocialController::class, 'redirectFacebook']);
Route::get('auth/facebook/callback',[SocialController::class, 'callbackFacebook']);