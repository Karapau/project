<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdressBuyer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'morada',
        'codigo_postal',
        'regiao',
        'distrito',
        'conselho',
        'freguesia',
    ];
}
