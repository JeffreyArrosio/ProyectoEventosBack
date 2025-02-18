<?php

namespace App\Http\Requests;

use Orion\Http\Requests\Request;

class CommentRequest extends Request
{
    public function commonRules(): array
    {
        return [
            'score' => 'nullable|in:1,2,3,4,5',
            'text' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
            'commentable_id' => 'required|integer',
            'commentable_type' => 'required|string|max:255',
        ];
    }
}
