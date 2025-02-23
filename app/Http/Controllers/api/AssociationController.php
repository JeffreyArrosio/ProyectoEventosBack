<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\AssociationRequest;
use App\Models\Association;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Laravel\Sanctum\HasApiTokens;
use Orion\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;

class AssociationController extends Controller
{
    use HasApiTokens;
    protected $model = Association::class;

    protected $request = AssociationRequest::class;
}
