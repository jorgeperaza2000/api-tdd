<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTeamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //'name' => 'required|unique:teams|max:100',
            'name' => [
                'required',
                'max:100',
                Rule::unique('teams')->ignoreModel($this->team),
            ],
            'slug_name' => 'required|max:20',
        ];
    }
}
