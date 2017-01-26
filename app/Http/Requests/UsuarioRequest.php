<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
        $userid = $this->route('id');
        return [
            'first_name'=>'required|max:35',
            'last_name'=>'required|max:35',
            'email'=>'required|max:255|email|unique:users,email,'.$userid,
            'country'=>'required|max:2',
            'country_birth'=>'required|max:2',
            'rol_id'=>'required|exists:roles,id',
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
            'first_name.required' => 'El primer nombre es requerido',
            'first_name.max' => 'El primer nombre debe ser menor a :max caracteres',
            'last_name.required' => 'El primer apellido es requerido',
            'last_name.max' => 'El primer apellido debe ser menor a :max caracteres',
            'email.required' => 'El correo electrónico es requerido',
            'email.max' => 'El correo electrónico debe ser menor a :max caracteres',
            'email.email' => 'El correo electrónico debe de ser válido',
            'email.unique' => 'El correo electrónico ya está registrado a otro usuario',
            'rol_id.required' => 'El rol de usuario es requerido',
            'rol_id.exists' => 'Error al seleccionar rol',
            'country.required' => 'El país de residencia es requerido',
            'country.max' => 'Error al seleccionar el país de residencia',
            'country_birth.required' => 'El país de nacimiento es requerido',
            'country_birth.max' => 'Error al seleccionar el país de nacimiento'
        ];
    }
}
