<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyerColective extends Model
{
    use HasFactory;

    protected $fillable = [
        'comprador_id', 
        'morada', 
        'nif',
        'contato',
        'telefone',
        'telemovel_empresa',
        'tipo',
       
    ];
}
