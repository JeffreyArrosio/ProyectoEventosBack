<?php

namespace App\Http\Controllers\api\RelationshipControllers;

use App\Models\Event;
use Laravel\Sanctum\HasApiTokens;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\RelationController;
use Illuminate\Http\Request;

class EventAssociationController extends RelationController
{
    use HasApiTokens, DisableAuthorization;

    protected $model = Event::class;

    protected $relation = 'associations';

}
