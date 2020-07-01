<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFormProducts extends FormRequest
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
            'name' => 'required|min:8|max:70|regex:/^[\pL\s\-]+$/u',
            'category' => 'required',
            'description' => 'required',
            'photo' => 'image',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El :attribute es obligatorio. ',
            'name.regex' => 'El :attribute debe de ser solo letras',
            'name.min' => 'El :attribute debe contener mas de 8 letras',
            'name.max' => 'El :attribute debe contener maximo de 70 letras',
            'category.required' => 'El :attribute es obligatorio',
            'description.required' => 'El :attribute es obligatorio',
            'photo.required' => 'El :attribute es obligatorio',
            'photo.mimes' => 'El :attribute debe de ser una imagen',

        ];
    }

    public function attributes()
    {
        return [
            'name' => 'campo nombre',
            'category' => 'campo campo categoria',
            'description' => 'campo descripcion',
            'photo' => 'campo foto',

        ];
    }

}
