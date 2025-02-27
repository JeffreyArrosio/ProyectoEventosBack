<?php

namespace App\Http\Controllers\api\RelationshipControllers;

use App\Models\User;
use Orion\Http\Controllers\RelationController;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;

class UserEventsController extends RelationController
{
    use DisableAuthorization;
    protected $model = User::class;
    protected $relation = 'events';
}
