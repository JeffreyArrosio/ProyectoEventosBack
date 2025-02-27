<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;

class UserController extends Controller
{
    use DisableAuthorization;
    protected $model = User::class;
    protected $policy = UserPolicy::class;

    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function show(User $user) {
        return new UserResource(User::find($user->id));
    }
}
