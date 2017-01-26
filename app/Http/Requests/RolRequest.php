<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolRequest extends FormRequest
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
            'rol_name' => 'required|max:20'
        ];
    }

    /**
     * Get the error messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'rol_name.required' => 'El nombre del rol es requerido',
            'rol_name.max' => 'El nombre de rol debe ser menor a :max caracteres',
        ];
    }
}
