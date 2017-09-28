<?php

namespace Apoyo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'sopa' =>'min:4|max:20|required',
            'plato_fuerte' =>'min:4|max:120|required',
            'jugo' =>'min:3|max:120|required',
            'postre' =>'min:4|max:120|required',
            'cantitotal' =>'required'
        ];
    }
}
