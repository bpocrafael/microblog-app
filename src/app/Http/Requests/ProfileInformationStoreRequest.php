<?php

namespace App\Http\Requests;

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileInformationStoreRequest extends FormRequest
{
    /**
    * Get the validation rules that apply to the request.
    *
    * @return array<string, mixed>
    */
    public function rules(): array
    {
        return [
            'firstname' => ['nullable', 'min:2', 'max:60'],
            'middlename' => ['nullable', 'min:2', 'max:60'],
            'surname' => ['nullable', 'min:2', 'max:60'],
            'image' => 'nullable',
            'about' => 'nullable',
        ];
    }
}
