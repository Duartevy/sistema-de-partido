<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VereadorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome'       => 'required|string|max:255',
            'cpf'        => [
                'required',
                'regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/',
                function ($attribute, $value, $fail) {
                    if (!isValidCpf($value)) {
                        $fail('O CPF informado é inválido.');
                    }
                }
            ],
            'email'      => 'required|email|max:255',
            'telefone'   => ['required', 'regex:/^\(\d{2}\) \d{5}\-\d{4}$/'],
            'estado'     => 'required|string|size:2|alpha|uppercase',
            'cidade'     => 'required|string|max:255',
            'partido_id' => 'required|exists:partidos,id',
            'foto'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'cpf.regex'         => 'O CPF deve estar no formato 000.000.000-00',
            'telefone.regex'    => 'O telefone deve estar no formato (00) 00000-0000',
            'email.email'       => 'Digite um e-mail válido',
            'partido_id.exists' => 'O partido selecionado é inválido',
            'foto.image'        => 'O arquivo deve ser uma imagem',
            'foto.mimes'        => 'A imagem deve estar no formato JPG, JPEG, PNG ou WEBP',
            'foto.max'          => 'A imagem não pode ter mais que 2MB',
        ];
    }
}

// ✅ Função auxiliar para validar CPF 
if (!function_exists('isValidCpf')) {
    function isValidCpf($cpf)
    {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        if (strlen($cpf) !== 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            $d = 0;
            for ($c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }
}
