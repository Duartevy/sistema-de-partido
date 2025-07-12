<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

    protected $fillable = ['sigla', 'nome', 'imagem'];

    // Relacionamento: Um partido tem muitos vereadores
    public function vereadores()
    {
        return $this->hasMany(Vereador::class);
    }
}
