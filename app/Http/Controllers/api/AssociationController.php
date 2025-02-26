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

        $association = new Association();
        $association->name = $request->name;
        $association->description = $request->description;
        if($request->max_member)$association->max_member = $request->max_member;
        $association->telephone = $request->telephone;
        $association->email = $request->email;
        $association->user_id = $request->user_id;
        $association->type_id = $request->type_id;
        if($request->hasFile('main_image')){
            $path = $request->file('main_image')->store('associations','public');
            $association->main_image = $path;
        };
        $association->save();
        return response()->noContent();
    }
}
