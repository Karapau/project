<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CompradorIndividual extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'compradorind';
    
    protected $fillable = [
        'user_id',
        'nome',
        'sobrenome',
        'email',
        'password',
        'telemovel',
        'morada',
        'nif',
        'codigo',
    ];
}
