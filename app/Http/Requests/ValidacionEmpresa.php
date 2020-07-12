<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionEmpresa extends FormRequest
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
            'rut' => 'required|max:50|unique:empresa,rut,' . $this->route('id'),
            'nombre' => 'required|max:50|unique:empresa,nombre,' . $this->route('id'),
            'razon_social' => 'nullable',
            'direccion' => 'nullable',
            'tipo' => 'nullable',
            'logo' => 'nullable',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
