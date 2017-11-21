<?php

namespace tpiproject\Http\Requests;

use tpiproject\Http\Requests\Request;

class PasantiaFormRequest extends Request
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
            'user_id' => 'required',
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'sexo' => 'required',
            'duracion' => 'required|numeric',
            'unidad_duracion' => 'required',
            'edad_inicial' => 'required|numeric',
            'edad_final' => 'required|numeric',
            'idioma' => 'max:255',
            'pago' => 'max:255',
            'tiempo_pago' => 'max:255',
            'carrera_id' => 'required'
        ];
    }
}
