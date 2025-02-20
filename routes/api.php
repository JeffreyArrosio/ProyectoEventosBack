<?php

use App\Http\Controllers\api\AssociationController;
use App\Http\Controllers\api\CommentController;
use App\Http\Controllers\api\EventController;
use App\Http\Controllers\api\ImageController;
use App\Http\Controllers\api\TypeController;
use App\Http\Controllers\EventUsersController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['as' => 'api'], function() {
    Orion::resource('associations', AssociationController::class);
    Orion::resource('comments', CommentController::class);
    Orion::resource('events', EventController::class);
    Orion::resource('images', ImageController::class);
    Orion::resource('types', TypeController::class);

})->middleware('sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/events/users', [EventUsersController::class, 'store']);

