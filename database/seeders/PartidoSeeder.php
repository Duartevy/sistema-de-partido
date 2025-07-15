<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partido;

class PartidoSeeder extends Seeder
{
    public function run()
    {
        $partidos = [
            [
                'sigla' => 'MDB',
                'nome'  => 'Movimento Democrático Brasileiro',
                'imagem' => 'partidos/fOpdxdN4gOm30DCZTsbOKAVw4eSmpnyi1Xdi4Rvn.jpg',
            ],
            [
                'sigla' => 'PT',
                'nome'  => 'Partido dos Trabalhadores',
                'imagem' => 'partidos/am69EO69mgqlykaOSFbIPJ4YcWWsnXyfBMfHc3sj.jpg',
            ],
            [
                'sigla' => 'PSDB',
                'nome'  => 'Partido Social Da Democracia Brasileira',
                'imagem' => 'partidos/sUIf1ZBv9OXsLu2nR9wMTh0rsO2sIK3SfZTK7rrq.png',
            ],
            [
                'sigla' => 'PP',
                'nome'  => 'Progressistas',
                'imagem' => 'partidos/T1PBQgW8joG5IoI4dynvx2GyzVfykrVVAk6EJOHt.png',
            ],
            [
                'sigla' => 'PDT',
                'nome'  => 'Partido Democrátido Trabalhista',
                'imagem' => 'partidos/ruiCfBjOZSp0jOzLCjZvNhf1TbQKcUr3Cly5R6M2.png',
            ],
            [
                'sigla' => 'PL',
                'nome'  => 'Partido Liberal',
                'imagem' => 'partidos/7fcFadU2EgXHjtsSAE18u3UDeEG2Ni1WAjLhX2us.png',
            ],
            [
                'sigla' => 'PRD',
                'nome'  => 'Partido Renovação Democrática',
                'imagem' => 'partidos/ud66PHobiHWCH4lofTjlfid3rlTqVA6lbfEPiKhH.png',
            ],
            [
                'sigla' => 'União',
                'nome'  => 'União Brasil',
                'imagem' => 'partidos/RppAJljouO0aWfIxSZWCndun1ylT3kt0zSJDAMRm.png',
            ],
            [
                'sigla' => 'PODE',
                'nome'  => 'Podemos',
                'imagem' => 'partidos/1y9L846Dmd0ngVPgw2T0OkKp139bnpWdssw9pWV0.png',
            ],
            [
                'sigla' => 'PSB',
                'nome'  => 'Partido Socialista Brasileiro',
                'imagem' => 'partidos/u9wXukvVKen9hewYfBYy0v0w9TtgPRhybD3cS2FRK24.png',
            ],
            [
                'sigla' => 'PSD',
                'nome'  => 'Partido Social Democrático',
                'imagem' => 'partidos/NDkh98CyFso98pYfTY2R8rwaCc1NENEMsFTv8R8g.png',
            ],
            [
                'sigla' => 'PCdoB',
                'nome'  => 'Partido Comunista do Brasil',
                'imagem' => 'partidos/aiQGGarhS3KMqEZh7BlSfWUitgKelPocooVv6YHm.png',
            ],
            [
                'sigla' => 'PSOL',
                'nome'  => 'Partido Socialismo e Liberdade',
                'imagem' => 'partidos/jFRXJwLU5sAQqcjEHkFJdZ3ovx3E622ffuF6YVEf.png',
            ],
            [
                'sigla' => 'PMB',
                'nome'  => 'Partido da Mulher Brasileira',
                'imagem' => 'partidos/mWG4a2csqylP6ktOQW9OtVmjlKCsb2HAgrDzmyeM.png',
            ],
            [
                'sigla' => 'Avante',
                'nome'  => 'Avante',
                'imagem' => 'partidos/MLyfMiqaeaGOX9uIiH5IBMtjR8sacN7Xq8Ed0Rmv.png',
            ],
        ];

        foreach ($partidos as $partido) {
            Partido::create($partido);
        }
    }
}
