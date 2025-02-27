<?php

namespace App\Http\Controllers\api\RelationshipControllers;

use App\Models\User;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\RelationController;
use Illuminate\Http\Request;

class UserAssociationsController extends RelationController
{
    use DisableAuthorization;
    protected $model = User::class;
    protected $relation = 'myAssociations';
}
