<?php

namespace Apoyo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubsidioRequest extends FormRequest
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
             'descripcion' =>'min:4|max:220|required',
             'type' =>'min:4|max:220|required'
        ];
    }
}
