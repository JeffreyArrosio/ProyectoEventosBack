<?php

namespace App\Http\Controllers\api\RelationshipControllers;

use Orion\Http\Controllers\RelationController;
use App\Models\Association;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Orion\Concerns\DisableAuthorization;

class AssociationUserController extends RelationController
{
    use DisableAuthorization;

    protected $model = Association::class;

    protected $relation = 'user';
}
