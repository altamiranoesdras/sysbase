<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OptionMenuFormRequest extends FormRequest
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
            'nombre' => 'required|max:45',
            'descripcion' => 'max:255',
            'icono_l' => 'required',
        ];
    }

    public function messages()
    {
        return [
            "icono_l.required" => "El icono izquierdo es obligatorio"
        ];
        
    }
}
