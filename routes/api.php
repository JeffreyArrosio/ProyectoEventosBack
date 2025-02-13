<?php

use App\Http\Controllers\api\AssociationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['as' => 'api'], function() {
    Orion::resource('associations', AssociationController::class);
})->middleware('sanctum');