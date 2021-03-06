<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionImagen extends FormRequest
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
            'estado' => 'nullable',
            'nombre' => 'required|max:50|unique:imagen,nombre,' . $this->route('id'),
            'img' => 'image|max:2000'
        ];
    }
}
