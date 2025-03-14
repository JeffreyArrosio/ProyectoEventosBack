<?php

namespace App\Http\Requests;

use Orion\Http\Requests\Request;

class AssociationRequest extends Request
{
    public function commonRules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'max_member' => 'nullable|integer|min:1',
            'telephone' => 'required|unique|regex:/^\+?[0-9]{7,15}$/',
            'email' => 'required|unique|email|max:255',
            'user_id' => 'required|exists:users,id',
            'type_id' => 'required|exists:types,id',
            'main_image' => 'nullable|file|image|max:4096',
        ];
    }
}
