<?php

return [
    'accepted'             => 'O campo :attribute deve ser aceito.',
    'active_url'           => 'O campo :attribute não é uma URL válida.',
    'after'                => 'O campo :attribute deve ser uma data posterior a :date.',
    'alpha'                => 'O campo :attribute deve conter somente letras.',
    'alpha_dash'           => 'O campo :attribute deve conter letras, números e traços.',
    'alpha_num'            => 'O campo :attribute deve conter letras e números.',
    'array'                => 'O campo :attribute deve ser um array.',
    'before'               => 'O campo :attribute deve ser uma data anterior a :date.',
    'between'              => [
        'numeric' => 'O campo :attribute deve estar entre :min e :max.',
        'file'    => 'O arquivo :attribute deve ter entre :min e :max kilobytes.',
        'string'  => 'O campo :attribute deve conter entre :min e :max caracteres.',
        'array'   => 'O campo :attribute deve conter entre :min e :max itens.',
    ],
    'email'                => 'O campo :attribute deve ser um endereço de e-mail válido.',
    'required'             => 'O campo :attribute é obrigatório.',
    'regex'                => 'O formato do campo :attribute é inválido.',
    'unique'               => 'O campo :attribute já está sendo utilizado.',

    // Customização de nomes dos campos
    'attributes' => [
        'cpf'      => 'CPF',
        'email'    => 'e-mail',
        'telefone' => 'telefone',
        'nome'     => 'nome',
        'estado'   => 'estado',
        'cidade'   => 'cidade',
        'foto'     => 'foto',
    ],
];
