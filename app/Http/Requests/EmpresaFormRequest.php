<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaFormRequest extends FormRequest
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
            'rfc' => 'required|min:12|max:14',
            'drs' => 'required|max:254',
            'regimen_fiscal' => 'required',
            'contribuyente' => 'required',

            'calle' => 'required|max:150',
            'nume' => 'required',
            'colonia' => 'required|max:150',
            'localidad' => 'required|max:150',
            'municipio' => 'required|max:150',
            'cp' => 'required|max:10',
            'estado' => 'required'
         ];
    }

    public function messages(){
        return [
                'rfc.required' => 'El RFC es requerido',
                'rfc.min' => 'El RFC es muy corto',
                'drs.required' => 'La Razón social es requerida'
            ];
    }
}

