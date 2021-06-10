<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_portugues',
        'nome_ingles',
        'nome_espanhol',
        'nome_cientifico',
        'codigo_fao',
        'codigo_lota',
        'tamanho_minimo',
        'image',
        'margem',
    
    ];

    public function portos()
    {
        return $this->belongsToMany(Porto::class, 'especie_to_portos');
    }

    public function estatisticas()
    {
        return $this->belongsToMany(EstatisticaDiaria::class, 'estatisticas_diarias');
    }
}
