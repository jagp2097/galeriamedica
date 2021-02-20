<?php

namespace galeriamedica\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArchivosActualizarRequest extends FormRequest
{
    protected $errorBag = 'errorsArchivosAct';

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
        //dd($request->all());
        $rules = [
            'nombre_foto' => [
                'required',
                'regex:/[a-zA-Z0-9\h]/m',
             ],
             'patologia' => 'required',
             'diagnostico' => 'required',
             'diagnosticoOtro' => 'required_if:patologia,==,Otro|required_if:diagnostico,==,Otro,&&,patologia,!=,Otro,',
             'patologiaOtro' => 'required_if:patologia,==,Otro',
             'region' => 'required',
             'periodo' => 'required',
            //  'tipo_archivo' => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'nombre_foto.required' => 'El campo Nombre es obligatorio',
            'nombre_foto.regex' => 'El campo Nombre debe contener solo letras',
            'patologia.required' => 'El campo Patología es obligatorio',
            'diagnostico.required' => 'El campo Diagnostico es obligatorio',
            'patologiaOtro.required_if' => 'El campo Patología es obligatorio',
            'diagnosticoOtro.required_if' => 'El campo Diagnostico es obligatorio',
            'region.required' => 'El campo Región debe contener solo letras',
            'periodo.required' => 'El campo Periodo es obligatorio',
            'tipo_archivo.required' => 'El campo Tipo de archivo debe contener solo letras'
        ];
    }
}
