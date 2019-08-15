<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionCuenta_bancaria extends FormRequest
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
            'rut' => 'required|max:50|unique:cuenta_bancaria,rut,' . $this->route('id'),
            'nombre' => 'required|max:50|unique:cuenta_bancaria,nombre,' . $this->route('id'),
            'correo' => 'nullable',
            'estado' => 'nullable'
        ];
    }
}
