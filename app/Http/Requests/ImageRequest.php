<?php

namespace App\Http\Requests;

use Orion\Http\Requests\Request;

class ImageRequest extends Request
{
    public function commonRules(): array
    {
        return [
            'url' => 'required|url|max:2048',
            'imageable_id' => 'required|integer',
            'imageable_type' => 'required|string|max:255',
        ];
    }
}
