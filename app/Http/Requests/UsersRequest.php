<?php

namespace galeriamedica\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UsersRequest extends FormRequest
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
                'name' => 'required',
                'username' => 'required',
                'email' => 'required',
                'password-antiguo' => 'required',
                'password-nuevo' => 'required|min:6|confirmed',
            ];
        }   
    }

    public function messages()
    {
        return [

            'name.required' => 'El campo Nombre(s) es obligatorio',
            'username.required' => 'El campo Nombre de usuario es obligatorio',
            'nombre.regex' => 'El campo Nombre(s) debe contener solo letras',
            'email.required' => 'El campo E-mail es obligatorio',
            'password-antiguo.required' => 'El campo Contraseña antigua es obligatorio',
            'password-nuevo.required' => 'El campo Nueva contraseña es obligatorio',
            'password-nuevo.min' => 'El campo Nueva contraseña debe contener 6 caracteres como minimo',
            'password-nuevo.confirmed' => 'El campo Nueva contraseña no coincide con la confirmación',

        ];
    }
}
