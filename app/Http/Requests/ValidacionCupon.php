<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionCupon extends FormRequest
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
            'descuento' => 'required|max:50|unique:cupon,descuento,' . $this->route('id'),
            'estado' => 'nullable',
            'fecha_termino' => 'nullable'
        ];
    }
}
