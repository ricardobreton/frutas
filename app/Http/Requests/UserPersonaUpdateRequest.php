<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPersonaUpdateRequest extends FormRequest
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
        // dd($this->route('usuario'));
        return [
            'rol'=> 'required',
            'ci_nit'=> 'nullable|max:15|unique:personas,ci_nit,'.$this->route('usuario.persona_id'),
            'nombres'=> 'required|max:250',
            'apellidos'=> 'nullable|max:250',
            'direccion'=> 'nullable|max:250',
            'telefonos'=> 'nullable|max:100',
            'fecha_nac'=> 'date|nullable',
            'name'=> 'required|max:250',
            'email'=> 'required|max:250|unique:users,email,'.$this->route('usuario.id'),
            'password'=> 'nullable|min:8|max:250',
            'avatar'=> 'nullable|image',
        ];
    }
}
