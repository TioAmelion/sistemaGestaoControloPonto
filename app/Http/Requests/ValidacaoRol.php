<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacaoRol extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
   public function rules()
    {
        return [
             'nome'  => 'required|max:50|unique:rol,nome,' . $this->route('id')
        ];
    }

    public function messages()
{
    return [
        'nome.required' => 'preenche o campo nome'
    ];
}
}
