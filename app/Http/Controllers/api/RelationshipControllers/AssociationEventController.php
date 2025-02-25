<?php

namespace App\Http\Controllers\api\RelationshipControllers;

use App\Models\Association;
use Laravel\Sanctum\HasApiTokens;
use Orion\Http\Controllers\RelationController;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;

class AssociationEventController extends RelationController
{
    use DisableAuthorization;
    protected $model = Association::class;

    protected $relation = 'events';
}
