<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vereador extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'foto', 'partido_id'];

    public function partido()
    {
        return $this->belongsTo(Partido::class);
    }
}
