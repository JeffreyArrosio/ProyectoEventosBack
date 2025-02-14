<?php

namespace App\Http\Requests;

use Orion\Http\Requests\Request;

class EventRequest extends Request
{
   public function commonRules() : array
    {
        return [
            'title' => 'required|max:255',
            'description' => 'required',
            'date_start' => 'required|date',
            'date_end' => 'required|date'
        ];
    }
}