<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PawafesListRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            's' => 'min:1',
            'p' => 'numeric|min:1|max:7'
        ];
    }
}
