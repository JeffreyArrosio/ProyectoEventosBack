<?php

namespace App\Http\Controllers\api;

use App\Models\Type;
use App\Policies\TypePolicy;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Laravel\Sanctum\HasApiTokens;
use Orion\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;

class TypeController extends Controller
{
    use DisableAuthorization;

    protected $model = Type::class;
    protected $policy = TypePolicy::class;
}
