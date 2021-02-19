<?php

namespace galeriamedica\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AlbumsRequest extends FormRequest
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
        $pacienteId = $request->id;
        if ($request->isMethod('PUT')) {
            return [
                'nombreAlbum' => array(
                    'required',
                    'regex:/[a-zA-Z\h]/m'),
                'descripcion' => array(
                    'regex:/[a-zA-Z0-9\s]/m',
                    'max:80',
                    'required')
                ];
        }
        else{
            return [
                /*'nombre_album' => Rule::unique('albums')->where(function ($query) use($pacienteId) {
                         return $query->where('paciente_id', $pacienteId);
                     }),*/
                'nombreAlbum' => [
                    'required',
                    'regex:/[a-zA-Z\h]/m',
                ],
                'descripcion' => [
                    'required',
                    'regex:/[a-zA-Z0-9\s]/m',
                    'max:80',
                    ],
                ];
        }
    }

    public function messages()
    {
        return [
            'nombreAlbum.required' => 'El nombre del álbum es obligatorio',
            'nombreAlbum.unique' => 'El nombre del álbum ya existe',
            'nombreAlbum.regex' => 'El nombre del álbum debe contener solo letras',
            'descripcion.required' => 'La descripción es obligatoria',
            'descripcion.regex' => 'Solo se aceptan letras y números',
            'descripcion.max' => 'El máximo de caracteres son 80'
        ];
    }
}
