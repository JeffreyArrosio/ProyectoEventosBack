<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Laravel\Sanctum\HasApiTokens;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;
use App\Models\Comment;

class CommentController extends Controller
{
    use HasApiTokens, DisableAuthorization;

    protected $model = Comment::class;
}
