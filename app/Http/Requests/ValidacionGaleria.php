<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionGaleria extends FormRequest
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
            'fecha_modificacion' => 'nullable',
            'estado' => 'nullable',
            'producto_id' => 'required|max:50|unique:galeria,producto_id,' . $this->route('id')
        ];
    }
}
