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

    public function store($request){

        $validate = $request->validated();

        $association = new Association();
        $association->name = $validate->name;
        $association->description = $validate->description;
        if($validate->max_member)$association->max_member = $validate->max_member;
        $association->telephone = $validate->telephone;
        $association->email = $validate->email;
        $association->user_id = $validate->user_id;
        $association->type_id = $validate->type_id;
        if($validate->hasFile('main_image')){
            $path = $validate->file('main_image')->store('associations','public');
            $association->main_image = $path;
        };
        $association->save();
        return response()->noContent();
    }
}
