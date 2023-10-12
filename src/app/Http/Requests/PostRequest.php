<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
    * Get the validation rules that apply to the request.
    *
    * @return array<string, mixed>
    */
    public function rules(): array
    {
        return [
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,gif|max:2048',
        ];
    }
}
