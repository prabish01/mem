<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'image' => 'required|image',
            'image_alt' => 'required|string|max:255',
            'alt_text' => 'required|string|max:255',
            // ... other rules
        ];
    }
}
