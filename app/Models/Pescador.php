<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pescador extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'pescador';
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'telefone',
        'morada',
        'cep',
        'nif',
        'iban',
        'porto',
        'fishing_zone',
        'status',
        'nome_embarcacao',
        'nome_embarcacao2',
        'nome_embarcacao3',
    ];

    public function produtos()
    {
        return $this->hasMany(Produto::class, 'pescador_id');
    }
}
