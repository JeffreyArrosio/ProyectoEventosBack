<?php

namespace App\Http\Controllers\api\RelationshipControllers;

use App\Models\Association;
use App\Models\User;
use Laravel\Sanctum\HasApiTokens;
use Orion\Http\Controllers\RelationController;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;

class AssociationUsersController extends RelationController
{
    use HasApiTokens, DisableAuthorization;

    protected $model = Association::class;

    protected $relation = 'users';
}
