<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'adress',
        'payment_mothod',
        'shipping_mothod',
        'user_id',
        'status',
        'user_name',
        'email',
        'telemovel',
        'total',
        'sub_total',
        'frete',
        'codigo'

    ];

    public function enderecos()
    {
        return $this->belongsTo(AdressBuyer::class, 'adress');
    }

    public function payimage()
    {
        return $this->hasOne(PayImage::class, 'order_id');
    }

}
