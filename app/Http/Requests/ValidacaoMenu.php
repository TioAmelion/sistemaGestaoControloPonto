<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidarCampoUrl;

class ValidacaoMenu extends FormRequest
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
             'nome'  => 'required|max:50|unique:menu,nome'.$this->route('id'),
             'url'   => ['required', 'max:50', new ValidarCampoUrl],
             'icone' => 'nullable|max:30'
        ];
    }

    public function messages()
{
    return [
        'nome.required' => 'preenche o campo nome',
        'url.required'  => 'preenche o campo url'
    ];
}
}
