<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Mail\EventJoined;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;


class EventUsersController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'event_id' => 'required|exists:events,id',
        ]);

        $event = Event::findOrFail($request->event_id);
        $user = User::findOrFail($request->user_id);

        $event->users()->attach($request->user_id);

        Mail::to($user->email)->send(new EventJoined($user, $event));
        return response()->json(['message' => 'Usuario agregado al evento'], 201);
    }
}
