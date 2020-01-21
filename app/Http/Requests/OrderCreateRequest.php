<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends FormRequest
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
            'customer_name' => 'required|min:3|max:75',
            'customer_surname' => 'required|min:3|max:75',
            'shopping_data_country' => 'required|min:3|max:100',
            'shopping_data_city' => 'required|min:3|max:50',
            'shopping_data_address' => 'required|min:15|max:150',
        ];
    }
}
