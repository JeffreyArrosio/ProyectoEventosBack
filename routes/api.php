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
use App\Http\Controllers\api\RelationshipControllers\EventCommentController;
use App\Http\Controllers\api\RelationshipControllers\UserAssociationsController;
use App\Http\Controllers\api\RelationshipControllers\UserEventsController;
use App\Http\Controllers\api\TypeController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\EventUsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    Orion::resource('users', UserController::class);
    //relaciones de Association

    Orion::belongsToManyResource('association', 'events', AssociationEventController::class);
    Orion::belongsToManyResource('association', 'users', AssociationUsersController::class);
    Orion::belongsToResource('association', 'user', AssociationUserController::class);
    Orion::hasManyResource('association', 'comments', AssociationCommentController::class);
    Orion::belongsToResource('association', 'type', AssociationTypeController::class);


    //relaciones de Event
    Orion::belongsToManyResource('event', 'associations', EventAssociationController::class);
    Orion::morphManyResource('event','comments', EventCommentController::class);

    Orion::hasManyResource('user','associations', UserAssociationsController::class);
    Orion::belongsToManyResource('user','events', UserEventsController::class);

})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/events/users', [EventUsersController::class, 'store']);
Route::get('/events/users', [EventUsersController::class, 'index']);

