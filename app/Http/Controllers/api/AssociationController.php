<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\AssociationRequest;
use App\Models\Association;
use App\Policies\AssociationPolicy;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Laravel\Sanctum\HasApiTokens;
use Orion\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;


class AssociationController extends Controller
{
    use DisablePagination, DisableAuthorization;
    protected $model = Association::class;
    protected $policy = AssociationPolicy::class;
    protected $request = AssociationRequest::class;

    public function store(Request $request){

        $validatedData = $request->validated([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'max_member' => 'nullable|integer|min:1',
            'telephone' => 'required|unique|regex:/^\+?[0-9]{7,15}$/',
            'email' => 'required|unique|email|max:255',
            'user_id' => 'required|exists:users,id',
            'type_id' => 'required|exists:types,id',
            'main_image' => 'nullable|file|image|max:4096',
        ]);
        dd($validatedData);
        $association = new Association();
        $association->name = $validatedData['name'];
        $association->description = $validatedData['description'];
        $association->max_member = $validatedData['max_member'] ?? null;
        $association->telephone = $validatedData['telephone'];
        $association->email = $validatedData['email'];
        $association->user_id = $validatedData['user_id'];
        $association->type_id = $validatedData['type_id'];

        if ($request->hasFile('main_image')) {
            $path = $request->file('main_image')->store('associations', 'public');
            $association->main_image = $path;
        }
        $association->save();
        return response()->noContent();
    }
}
