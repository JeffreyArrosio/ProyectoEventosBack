<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Laravel\Sanctum\HasApiTokens;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;
use App\Models\Comment;
use App\Policies\CommentPolicy;

class CommentController extends Controller
{
    use DisableAuthorization;

    protected $model = Comment::class;

    protected $policy = CommentPolicy::class;

    protected $request = CommentRequest::class;
}
