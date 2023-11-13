<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPersonaRequest extends FormRequest
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
        // dd($this->route(.$this->route('usuario.id')));
        return [
            'rol'=> 'required',
            'ci_nit'=> 'nullable|max:15|unique:personas,ci_nit,',
            'nombres'=> 'required|max:250',
            'apellidos'=> 'nullable|max:250',
            'direccion'=> 'nullable|max:250',
            'telefonos'=> 'nullable|max:100',
            'fecha_nac'=> 'date|nullable',
            'name'=> 'required|max:250',
            'email'=> 'required|max:250|unique:users,email',
            'password'=> 'required|min:8|max:250',
            'avatar'=> 'nullable|image',
        ];
    }
}
