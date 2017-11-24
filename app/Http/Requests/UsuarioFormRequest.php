<?php

namespace tpiproject\Http\Requests;

use tpiproject\Http\Requests\Request;

class UsuarioFormRequest extends Request
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'min:6|confirmed',
            'empresa' => 'required|max:255',
            'ciudad' => 'required',
            'direccion' => 'max:255',
            'sector' => 'required',
            'telefono' => 'numeric',
            'web' => 'max:255'
        ];
    }
}
