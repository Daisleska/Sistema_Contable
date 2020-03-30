<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductosRequest extends FormRequest
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
            'codigo' => 'required',
            'nombre' => 'required',
            'existencia' => 'required|numeric',
            'unidad' => 'required',
            'precio' => 'required|numeric',
            'stock_min' => 'required|numeric',
            'stock_max' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [

            'codigo.required' => 'El Código del producto es obligatorio',
            'nombre.required' => 'El Nombre del producto es obligatorio',
            'existencia.required' => 'La Existencia es obligatoria',
            'existencia.numeric' => 'La Existencia sólo debe contener números',
            'unidad.required' => 'Debe seleccionar una Unidad de medida',
            'precio.required' => 'El Precio es obligatorio',
            'precio.numeric' => 'El Precio solo debe contener números',
            'stock_min.required' => 'El Stock Mínimo es obligatorio',
            'stock_min.numeric' => 'El Stock Mínimo sólo debe contener números',
            'stock_max.required' => 'El Stock Máximo es obligatorio',
            'stock_max.numeric' => 'El Stock Máximo sólo debe contener números'
        ];
    }
}
