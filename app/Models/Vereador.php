<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vereador extends Model
{
    use HasFactory;

    protected $table = 'vereadores';

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
