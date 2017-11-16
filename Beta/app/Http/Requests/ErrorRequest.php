<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ErrorRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'unique:users|required'
        ];
    }
    
    public function messages()
    {
        return [
            'email.unique' => 'E-mailadres is al ingebruik!'
        ];
    }

}
