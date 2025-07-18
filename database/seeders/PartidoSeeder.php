<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partido;

class PartidoSeeder extends Seeder
{
    public function run()
    {
        $partidos = [
                        ['sigla' => 'MDB', 'nome' => 'Movimento Democrático Brasileiro', 'imagem' => 'partidos/B5nbOKbj6wX9w8TZKraae8hc5wxPA09Sf1iREesC.jpg'],
                        ['sigla' => 'PT', 'nome' => 'Partido dos Trabalhadores', 'imagem' => 'partidos/BIASvxUu6uYi4tdjPQHv1joIBTonLkXAl1XD45dV.jpg'],
                        ['sigla' => 'PSDB', 'nome' => 'Partido Social Da Democracia Brasileira', 'imagem' => 'partidos/sUIf1ZBv9OXsLu2nR9wMTh0srO2sIK3SfzTK7rrq.png'],
                        ['sigla' => 'PP', 'nome' => 'Progressistas', 'imagem' => 'partidos/dJHqQvpgjlGPaiIy2Wlt3h2Mz0vvGGa6uqLLEX0N.png'],
                        ['sigla' => 'PDT', 'nome' => 'Partido Democrátido Trabalhista', 'imagem' => 'partidos/pEBFcmD5hnOO6C3EjYloHdibEnisDwipMQ4QzHSr.png'],
                        ['sigla' => 'PL', 'nome' => 'Partido Liberal', 'imagem' => 'partidos/NMG8Axv4JOgoP0lmWfvq3cjKJb5YMwHTQhGpGCkw.png'],
                        ['sigla' => 'PRD', 'nome' => 'Partido Renovação Democrática', 'imagem' => 'partidos/GLHR7bCEAAbBbDZgxWGPArlTzyczflXgYBbZCeMA.png'],
                        ['sigla' => 'União', 'nome' => 'União Brasil', 'imagem' => 'partidos/K6MPLOIWc3xBc0saig86nMxQWEfAcCmnfdS4DhqD.png'],
                        ['sigla' => 'PODE', 'nome' => 'Podemos', 'imagem' => 'partidos/rnqC59p8iPseATXKMEQIdiqmaOgKsGjGgJ4J6bWG.png'],
                        ['sigla' => 'PSB', 'nome' => 'Partido Socialista Brasileiro', 'imagem' => 'partidos/u9wXukwVCENjhwfBYPy0vW9tgPryhD3bCszFRK24.png'],
                        ['sigla' => 'PSD', 'nome' => 'Partido Social Democrático', 'imagem' => 'partidos/RE06EqK5E5AtasFZ6b3nxglmopeaKISqb5TwFsck.png'],
                        ['sigla' => 'PCdoB', 'nome' => 'Partido Comunista do Brasil', 'imagem' => 'partidos/zswlTgNiMxT3YjwauYGcFHhAOyqDhkDmNzCM48UG.png'],
                        ['sigla' => 'PSOL', 'nome' => 'Partido Socialismo e Liberdade', 'imagem' => 'partidos/jqiHGpMOKPxFdbM8JSrvD1XPWMgw14TygiegjcFw.png'],
                        ['sigla' => 'PMB', 'nome' => 'Partido da Mulher Brasileira', 'imagem' => 'partidos/gK28x9r3l5Rb1K8X1jlXwttnuRmrnGy7zBvBAWgh.png'],
                        ['sigla' => 'Avante', 'nome' => 'Avante', 'imagem' => 'partidos/H8FlYEHcd9uZqomPvUEaFzZMMdENCwLTk7o2l7uK.png'],
                ];


        foreach ($partidos as $partido) {
            $registro = Partido::where('sigla', $partido['sigla'])->first();

            if (!$registro) {
                Partido::create($partido);
            } else {
                // Atualiza imagem se estiver vazia
                if (!$registro->imagem) {
                    $registro->update(['imagem' => $partido['imagem']]);
                }

                // Também atualiza nome caso esteja desatualizado
                if ($registro->nome !== $partido['nome']) {
                    $registro->update(['nome' => $partido['nome']]);
                }
            }
        }
    }
}
