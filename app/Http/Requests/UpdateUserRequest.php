<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:8|max:64',
            'email' => 'regex:/^.+@.+$/i|required',
            'repeat_email' => 'same:email|required|regex:/^.+@.+$/i',
            'password' => 'required',
            'photo' => 'image',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El :attribute es requerido',
            'name.regex' => 'El :attribute debe ser solo letras',
            'name.min' => 'El :attribute debe de tener minimo 8 caracteres',
            'name.max' => 'El :attribute debe de tener maximo 64 caracteres',
            'email.regex' => 'El formato del :attribute no es valido',
            'email.required' => 'El :attribute es requerido',
            'password.required' => 'La :attribute es requerida',
            'password.password' => 'La :attribute no coincide con la registrada',
            'repeat_email.required' => ':attribute es requerido',
            'repeat_email.regex' => 'El formato de :attribute no es valido',
            'repeat_email.same' => 'email y :attribute no coinciden',
            'photo' => 'el :attribute debe de ser imagen',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'nombre',
            'email' => 'email',
            'repeat_email'=> 'confirmar email',
            'password' => 'password',
            'photo' => 'Campo photo',
        ];
    }
}
