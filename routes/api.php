<?php

use App\Http\Controllers\api\AssociationController;
use App\Http\Controllers\api\RelationshipControllers\AssociationEventController;
use App\Http\Controllers\api\CommentController;
use App\Http\Controllers\api\RelationshipControllers\EventAssociationController;
use App\Http\Controllers\api\EventController;
use App\Http\Controllers\api\ImageController;
use App\Http\Controllers\api\RelationshipControllers\AssociationCommentController;
use App\Http\Controllers\api\RelationshipControllers\AssociationTypeController;
use App\Http\Controllers\api\RelationshipControllers\AssociationUserController;
use App\Http\Controllers\api\RelationshipControllers\AssociationUsersController;
use App\Http\Controllers\api\TypeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\EventUsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('sanctum');

Route::group(['as' => 'api'], function() {
    Orion::resource('associations', AssociationController::class);
    Orion::resource('comments', CommentController::class);
    Orion::resource('events', EventController::class);
    Orion::resource('images', ImageController::class);
    Orion::resource('types', TypeController::class);

    //relaciones de Association

    Orion::belongsToManyResource('association', 'events', AssociationEventController::class);
    Orion::belongsToManyResource('association', 'users', AssociationUsersController::class);
    Orion::belongsToResource('association', 'user', AssociationUserController::class);
    Orion::hasManyResource('association', 'Comments', AssociationCommentController::class);
    Orion::belongsToResource('association', 'type', AssociationTypeController::class);


    //relaciones de Event
    Orion::hasManyResource('event', 'associations', EventAssociationController::class);
    

})->middleware('sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/events/users', [EventUsersController::class, 'store']);

