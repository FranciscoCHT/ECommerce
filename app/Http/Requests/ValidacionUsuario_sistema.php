<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionUsuario_sistema extends FormRequest
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
            'nombre' => 'required|max:50',
            'apellido' => 'required|max:50',
            'password' => 'required|max:50',
            'correo' => 'required|max:100',
            'tipo' => 'required|max:50',
            'correo' => 'required|max:50|unique:usuario_sistema,correo,' . $this->route('id')
        ];
    }
}
