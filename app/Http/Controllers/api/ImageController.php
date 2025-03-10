<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use App\Policies\ImagePolicy;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Laravel\Sanctum\HasApiTokens;
use Orion\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;

class ImageController extends Controller
{
    use DisableAuthorization;

    protected $model = Image::class;
    protected $policy = ImagePolicy::class;
    protected $request = ImageRequest::class;
}
