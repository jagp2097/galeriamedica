<?php

namespace galeriamedica\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArchivosRequest extends FormRequest
{
    protected $errorBag = 'errorsArchivos';
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
      // dd($request->file('archivo')->getErrorMessage());
      $rules = [
          'nombreArchivo' => array(
            'required',
            'regex:/[a-zA-Z0-9\h]/m',
           ),
          'patologia' => 'required',
          'diagnostico' => 'required_unless:patologia,!=,Otro',
          'diagnosticoOtro' => 'required_if:patologia,==,Otro|required_if:diagnostico,==,Otro,&&,patologia,!=,Otro,',
          'patologiaOtro' => 'required_if:patologia,==,Otro',
          'region' => 'required',
          'periodo' => 'required',
          'archivo' => 'required|mimetypes:image/jpeg,image/png,video/mp4|max:10240',
         ];

          return $rules;
    }

    public function messages()
    {
        return [
            'archivo.max' => 'El tamaño máximo del archivo es de 10MB (10240 KB)'
        ];
    }
}
