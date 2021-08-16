<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Porto extends Model
{
    use HasFactory;


    protected $fillable = [
        'nome',
        'image',
        'registro',
        'descarga',
        'controle_veterinario',
        'especies',
        'sigla',
        'codigo_postal',
        'morada',
        'regiao',
        'porta',
        'distrito',
        'conselho',
        'freguesia',
        'latitude',
        'longitude',

    ];

    public function especies()
    {
        return $this->belongsToMany(Especie::class, EspecieToPorto::class, 'porto_id', 'especie_id');
    }

    public function produtos()
    {
        return $this->hasMany(Produto::class, 'porto_id');
    }
    // public function estatisticas()
    // {
    //     return $this->belongsToMany(Especie::class,  EstatisticaDiaria::class, 'porto_id', 'especie_id');
    // }
}
