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
        'user_id',
        'wallet'
    ];

    public function orders()
    {
        return $this->belongsTo(UserOrder::class, 'order_id');
    }
    public function adresses()
    {
        return $this->belongsTo(AdressBuyer::class, 'adress');
    }

 

    public function products2()
    {
        return $this->hasMany(UserProduct::class, 'order_id', 'order_id');
    }
    public function products()
    {
        return $this->belongsTo(UserProduct::class, 'produtos');
    }
    public function users()
    {
        return $this->belongsTo(Comprador::class, 'user_id');
    }
    public function pescador()
    {
        return $this->belongsTo(Pescador::class, 'pescador_id');
    }
    public function values()
    {
        return $this->belongsTo(SellToWallet::class, 'wallet');
    }
}
