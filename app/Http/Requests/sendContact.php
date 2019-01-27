<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class sendContact extends FormRequest
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
            'reference' => 'required|string|unique:produits',
            'designation' => 'required|string',
            'formule' => 'required|string',
            'qte' => 'required|numeric',
            'categorie' => 'required|string',
            'unite' => 'required|string',
        ];
    }
}
