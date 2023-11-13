<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeccionRequest extends FormRequest
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
        // $seccion = $this->route()->parameter('seccion');
        $rules = [
            'seccion' => 'required',
            'status' => 'required|in:1,2',
            'file' => 'sometimes|image|max:2048',
        ];

        // if($seccion){
        //     $rules['name'] = 'required|unique:seccions,name,'.$seccion->id;
        // }

        // if($this->status == 2){
        //     $rules = array_merge($rules, [
        //         'category_id' => 'required',
        //         'tags' => 'required',
        //         'extract' => 'required',
        //         'body' => 'required',
        //     ]);
        // }
        return $rules;
    }

    public function messages()
    {
        return [
            'seccion.required' => 'El campo seccion es obligatorio.',
            'file.image' => 'El archivo debe ser una imagen.',
            // 'file.mimes' => 'La imagen debe ser de uno de los siguientes formatos: jpeg, png, jpg o gif.',
            'file.max' => 'La imagen no debe superar los :max kilobytes.',
        ];
    }
}
