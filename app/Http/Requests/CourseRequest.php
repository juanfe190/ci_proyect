<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'name'=>'required|max:150',
            'description'=>'required|max:500',
            'category_id'=>'required|exists:categories,id',
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
            'name.required' => 'El campo nombre es requerido',
            'description.required' => 'El campo descripcion es requerido.',
            'category_id.required' => 'Debe seleccionar una categoria'
        ];
    }
}
