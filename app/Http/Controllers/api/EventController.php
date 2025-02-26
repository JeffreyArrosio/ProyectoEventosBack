<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Policies\EventPolicy;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Laravel\Sanctum\HasApiTokens;
use Orion\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;
class EventController extends Controller
{
    use DisableAuthorization;

    protected $model = Event::class;
    protected $policy = EventPolicy::class;
    protected $request = EventRequest::class;

    public function store($request){

        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->user_id = $request->user_id;
        $event->type_id = $request->type_id;
        $event->date_start = $request->date_start;
        $event->date_end = $request->date_end;
        $event->access_type = $request->access_type;
        if($request->hasFile('main_image')){
            $path = $request->file('main_image')->store('associations','public');
            $event->main_image = $path;
        };
        $event->save();
    }
}
