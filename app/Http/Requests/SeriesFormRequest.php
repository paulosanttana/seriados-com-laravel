<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class SeriesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //setado com true porque o sistema não tem autenticação de acesso
    }

    // regras de validação ///////////
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|min:2'
        ];
    }

    // mensagens da validação ///////////
    public function messages()
    {
        return [
            'nome.required' => 'O campo :attribute é obrigatório',
            'nome.min' => 'O campo :attribute precisa ter pelo meno 2 caracteres'
        ];
    }
}
