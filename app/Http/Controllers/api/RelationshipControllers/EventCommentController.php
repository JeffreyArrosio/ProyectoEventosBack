<?php

namespace App\Http\Controllers\api\RelationshipControllers;

use App\Models\Event;
use Laravel\Sanctum\HasApiTokens;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\RelationController;
use Illuminate\Http\Request;

class EventCommentController extends RelationController
{
    use DisableAuthorization;

    protected $model = Event::class;

    protected $relation = 'comments';

}
