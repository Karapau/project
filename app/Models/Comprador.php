<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Comprador extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'buyer';

    protected $fillable = [
        'user_id',
        'name',
        'lastname',
        'telemovel',
        'email',
        'password',
        'codigo',
        'type'
    ];

    public function coletivos()
    {
        return $this->hasMany(BuyerColective::class, 'comprador_id');
    }
    public function individuais()
    {
        return $this->hasMany(BuyerInduvidual::class, 'comprador_id');
    }
    public function comercial()
    {
        return $this->belongsTo(Consultor::class, 'user_id');
    }
}
