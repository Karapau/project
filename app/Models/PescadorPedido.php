<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PescadorPedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'pescador_id',
        'order_id',
        'adress',
        'produtos',
        'user_id'
    ];

    public function orders()
    {
        return $this->belongsTo(UserOrder::class, 'order_id');
    }
    public function adresses()
    {
        return $this->belongsTo(AdressBuyer::class, 'adress');
    }
    public function products()
    {
        return $this->belongsTo(UserProduct::class, 'produtos');
    }
}
