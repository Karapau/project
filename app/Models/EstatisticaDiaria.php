<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstatisticaDiaria extends Model
{
    use HasFactory;

    protected $fillable = [
        'porto_id',
        'especie',
        'preco_minimo',
        'preco_medio',
        'preco_maximo',
    ];

    public function porto()
    {
        return $this->belongsToMany(Porto::class, 'porto_id');
    }

 
}
