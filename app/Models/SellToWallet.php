<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellToWallet extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'pescador_id',
        'product_id',
        'value',


    ];
}
