<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModifierMotDePasseRequest extends FormRequest
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
            //Définir les règles ici
            'new_password' => 'required|min:8',
            're_password' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            //Définir les messages d'erreur pour chaque règle
            'new_password.required' => 'Le champs mot de passe est requis.',
            'new_password.min' => 'Le mot de passe doit atteindre au moins 8 caractères.',
            're_password.required' => 'Vous devez confirmer votre mot de passe.',
            're_password.min' => 'Le mot de passe doit atteindre au moins 8 caractères.',
        ];
    }

}
