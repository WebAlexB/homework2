<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:5 | max:50'],
            'surname' => ['required', 'string', 'min:5 | max:50'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $this->user->id],
            'birthday' => ['required', 'date'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10']
        ];
    }
}
