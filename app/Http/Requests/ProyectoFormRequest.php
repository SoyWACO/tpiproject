<?php

namespace tpiproject\Http\Requests;

use tpiproject\Http\Requests\Request;

class ProyectoFormRequest extends Request
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
            'carrera_id' => 'required'
        ];
    }
}
