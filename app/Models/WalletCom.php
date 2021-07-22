<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletCom extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'comprador_id',
        'pescador_id',
        'product_id',
        'value',
        'total',
        'status',

    ];
}
