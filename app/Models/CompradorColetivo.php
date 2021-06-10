<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CompradorColetivo extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guard = 'buyer';

    protected $fillable = [
        'user_id', 
        'nome',
        'telefone', 
        'telemovel_empresa',
        'email',
        'password',
        'morada',
        'nif',
        'contato',
        'telemovel',
        'tipo',
        'codigo',
    ];
}
