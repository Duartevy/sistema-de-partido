<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartidoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'sigla' => 'required|string|max:10',
            'nome' => 'required|string|max:255',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'sigla.required' => 'A sigla é obrigatória.',
            'sigla.max' => 'A sigla pode ter no máximo 10 caracteres.',
            'nome.required' => 'O nome é obrigatório.',
            'nome.max' => 'O nome pode ter no máximo 255 caracteres.',
            'imagem.image' => 'O arquivo enviado deve ser uma imagem.',
            'imagem.mimes' => 'A imagem deve estar no formato jpg, jpeg, png ou webp.',
            'imagem.max' => 'A imagem pode ter no máximo 2MB.',
        ];
    }
}
