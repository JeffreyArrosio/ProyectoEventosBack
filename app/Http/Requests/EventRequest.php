<?php

namespace App\Http\Requests;

use Orion\Http\Requests\Request;

class EventRequest extends Request
{
    public function commonRules(): array
    {
        return [
            'date_start' => 'required|date|after_or_equal:today',
            'date_end' => 'required|date|after:date_start',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'access_type' => 'required|in:all,anticipated,exclusive',
            'type_id' => 'required|exists:types,id',
        ];
    }
}
