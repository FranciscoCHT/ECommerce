<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionOferta extends FormRequest
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
            'nombre' => 'required|max:50|unique:oferta,nombre,' . $this->route('id'),
            'descripcion' => 'nullable',
            'fecha_inicio' => 'nullable',
            'fecha_termino' => 'nullable',
            'estado' => 'nullable'
        ];
    }
}
