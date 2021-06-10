<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspecieToPorto extends Model
{
    use HasFactory;

    protected $fillable = [
        'porto_id',
        'especie_id',
    ];

    public function porto()
    {
        return $this->belongsToMany(Porto::class, 'porto_id');
    }
}
