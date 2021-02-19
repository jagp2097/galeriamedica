<?php

namespace galeriamedica\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request; //Validar si el metodo del form

class PacientesRequest extends FormRequest
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
    public function rules(Request $request)
    {
        if ($request->isMethod('PUT')) {
            return [
            //Son los name del formulario
                //'registro' => 'required|integer|unique:pacientes,registro',
                'nombre' =>  array( 
                    'required',
                    'regex:/[a-zA-Z\h]/m'),   
                'apellido_paterno' => 'required|alpha',
                'apellido_materno' => 'required|alpha',
            ];
        }else{
            return [
            //Son los name del formulario
                'registro' => 'required|integer|unique:pacientes,registro',
                'nombre' =>  array( 
                    'required',
                    'regex:/[a-zA-Z\h]/m'),
                'apellido_paterno' => 'required|alpha',
                'apellido_materno' => 'required|alpha',
            ];
        }
    }

    public function messages()
    {
        return [
            'registro.required' => 'El campo número de registro es obligatorio',
            'registro.integer' => 'El campo número de registro debe contener solo números',
            'registro.unique' => 'El número de registro ya existe',
            'nombre.required' => 'El campo Nombre(s) es obligatorio',
            'nombre.regex' => 'El campo Nombre(s) debe contener solo letras',
            'apellido_paterno.required' => 'El campo Apellido Paterno es obligatorio',
            'apellido_paterno.alpha' => 'El campo Apellido Paterno debe contener solo letras',
            'apellido_materno.required' => 'El campo Apellido Materno es obligatorio',
            'apellido_materno.alpha' => 'El campo Apellido Materno debe contener solo letras'
        ];
    }
}