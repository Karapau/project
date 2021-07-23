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
        'order_id',
        'value',
        'total',
        'status',

    ];

    public function orders()
    {
        return $this->belongsTo(UserOrder::class, 'order_id');
    }
}
