<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyerInduvidual extends Model
{
    use HasFactory;

    protected $fillable = [
        'comprador_id', 
        'morada', 
        'nif',
    ];
}
