<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vereador extends Model
{
    use HasFactory;

    // Corrige o nome da tabela usada pelo Eloquent
    protected $table = 'vereadores';

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'telefone',
        'estado',
        'cidade',
        'foto',
        'partido_id',
    ];

    // Relacionamento: Vereador pertence a um Partido
    public function partido()
    {
        return $this->belongsTo(Partido::class);
    }
}
