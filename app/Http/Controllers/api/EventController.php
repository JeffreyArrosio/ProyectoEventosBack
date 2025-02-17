<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Laravel\Sanctum\HasApiTokens;
use Orion\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;
class EventController extends Controller
{
    use HasApiTokens, DisableAuthorization;

    protected $model = Event::class;

    protected $request = EventRequest::class;
}
