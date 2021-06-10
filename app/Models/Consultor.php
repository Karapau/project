<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Consultor extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'consultor';
    protected $fillable = [
        'name',
        'email',
        'password',
        'lastname',
        'image',
        'morada',
        'iban',
        'nif',
    ];
}
