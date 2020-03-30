<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProvidersRequest extends FormRequest
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
            'business_name' => 'required',
            'rut' => 'required',
            'salesman' => 'required',
            'email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'business_name.required' => 'El Nombre de la Empresa es obligatorio',
            'rut.required' => 'El RUT es obligatorio',
            'salesman.required' => 'El Nombre del representante es obligatorio',
            'email.required' => 'El Correo es obligatorio',
            'email.email' => 'El Correo debe tener un formato válido'
        ];
    }
}
