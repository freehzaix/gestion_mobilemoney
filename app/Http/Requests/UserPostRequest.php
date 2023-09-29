<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|unique:users|max:200',
            'password' => 'required|min:5',
            'nom' => 'required',
            'prenom' => 'required',
        ];
    }

    public function messages(){
        return [
            'email.required' => 'L\'adresse mail est requis.',
            'email.unique' => 'L\'adresse mail exite déjà.',
            'email.max' => 'L\'adresse mail ne doit pas dépasser 200 caractères.',
            'password.required' => 'Le mot de passe est requis.',
            'password.min' => 'Le mot de passe doit contenir plus de caractères.',
            'nom.required' => 'Le champs nom est requis.',
            'prenom.required' => 'Le champs prenom est requis.',
        ];
    }
}
