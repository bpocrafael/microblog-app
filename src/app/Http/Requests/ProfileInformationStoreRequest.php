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
            'firstname' => 'required',
            'middlename' => 'nullable',
            'surname' => 'required',
            'image' => 'nullable',
            'about' => 'nullable',
        ];
    }
}
