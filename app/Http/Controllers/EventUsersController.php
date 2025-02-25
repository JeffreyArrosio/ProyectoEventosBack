<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Mail\EventJoined;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orion\Concerns\DisableAuthorization;


class EventUsersController extends Controller
{
    use DisableAuthorization;

    public function index(Request $request)
{
    $user = Auth::user();

    if ($request->has('user_id')) {
        $user = User::find($request->user_id);
        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
    }

    $events = $user->events()->with('associations')->get();

    return response()->json($events, 200);
}
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
