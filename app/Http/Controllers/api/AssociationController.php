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
            'telephone' => 'required|unique|regex:/^\+?[0-9]{7,15}$/',
            'email' => 'required|unique|email|max:255',
            'main_image' => 'nullable|file|image|max:4096',
        ]);
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
