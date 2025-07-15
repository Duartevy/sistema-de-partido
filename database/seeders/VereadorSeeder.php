<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vereador;
use App\Models\Partido;

class VereadorSeeder extends Seeder
{
    public function run()
    {
        $dados = [
            ['sigla' => 'PP', 'nome' => 'Guga Pet', 'cpf' => '117.300.684-77', 'email' => 'guga@gmail.com', 'telefone' => '(83) 98786-1252', 'estado' => 'PB', 'cidade' => 'João Pessoa', 'foto' => 'vereadores/oD278u3MjHyo9ByV1Vkl7Es7aZZ81lSduAKkcmwx.jpg'],
            ['sigla' => 'PDT', 'nome' => 'Fábio Riva', 'cpf' => '174.516.151-32', 'email' => 'fabioriva@gmail.com', 'telefone' => '(11) 95478-1211', 'estado' => 'SP', 'cidade' => 'São Paulo', 'foto' => 'vereadores/qVgrZvyyJy9MRMMxAdbMUPN68GM1k3oqTSveH5i3.jpg'],
            ['sigla' => 'PCdoB', 'nome' => 'Amanda Phascoal', 'cpf' => '476.151.645-56', 'email' => 'amanda@hotmail.com', 'telefone' => '(13) 98782-1452', 'estado' => 'SP', 'cidade' => 'São Paulo', 'foto' => 'vereadores/7CMzILBXMC8nD4PhDYW9t9iIzSrIKchsf1v30v6B.jpg'],
            ['sigla' => 'PSD', 'nome' => 'Marcio Ribeiro', 'cpf' => '968.854.781-54', 'email' => 'marcio@gmail.com', 'telefone' => '(21) 96587-5415', 'estado' => 'RJ', 'cidade' => 'Rio de Janeiro', 'foto' => 'vereadores/wg1MX4trd1zodGCxgeax3V9FTq5DPmnjuUQxkLMH.jpg'],
            ['sigla' => 'Avante', 'nome' => 'Marcos Bandeira', 'cpf' => '457.112.214-44', 'email' => 'marcos@outlook.com', 'telefone' => '(83) 98825-4745', 'estado' => 'PB', 'cidade' => 'João Pessoa', 'foto' => 'vereadores/PBQiH1ZTKY3YonUQMQy6AgsPFSemciakw24yQMlv.jpg'],
            ['sigla' => 'PP', 'nome' => 'Eliza Virginia', 'cpf' => '963.587.125-45', 'email' => 'eliza12@gmail.com', 'telefone' => '(83) 98871-2547', 'estado' => 'PB', 'cidade' => 'João Pessoa', 'foto' => 'vereadores/teZejKdom0jE4Emqc4lJ9jL46ykvVDL8ju9svJls.jpg'],
            ['sigla' => 'PSB', 'nome' => 'Romerinho Jatobá', 'cpf' => '549.681.468-42', 'email' => 'romerinho@gmail.com', 'telefone' => '(81) 95874-3611', 'estado' => 'PE', 'cidade' => 'Recife', 'foto' => 'vereadores/vxEr4j2p3L6HIG0ukdP823RlhIk4wg23Ejx9OWPU.jpg'],
            ['sigla' => 'PL', 'nome' => 'Gilson Machado Filho', 'cpf' => '444.985.662-65', 'email' => 'gilsonfilho@hotmail.com', 'telefone' => '(81) 95568-9654', 'estado' => 'PE', 'cidade' => 'Recife', 'foto' => 'vereadores/5ISqOPbnebw6X31cd78wnSi8EVwil1cEF4dfvl4x.jpg'],
        ];

        foreach ($dados as $dado) {
            $partido = Partido::where('sigla', $dado['sigla'])->first();

            if ($partido) {
                Vereador::firstOrCreate(
                    ['cpf' => $dado['cpf']], // condição para evitar duplicatas
                    [
                        'nome' => $dado['nome'],
                        'email' => $dado['email'],
                        'telefone' => $dado['telefone'],
                        'estado' => $dado['estado'],
                        'cidade' => $dado['cidade'],
                        'partido_id' => $partido->id,
                        'foto' => $dado['foto'],
                    ]
                );
            }
        }
    }
}
