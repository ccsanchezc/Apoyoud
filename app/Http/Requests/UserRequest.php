<?php

namespace Apoyo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'codigo' =>'min:5|max:20|required|unique:users',
            'nombre' =>'min:4|max:120|required',
            'apellido' =>'min:4|max:120|required',
            'telefono' =>'min:7|max:10|required',
            'direccion' =>'min:7|max:120|required',
            'email' =>'min:4|max:250|required|email|unique:users',
            'password' =>'min:6|max:120|required|confirmed'
        ];
    }
}
