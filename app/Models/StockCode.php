<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockCode extends Model
{
    use HasFactory;
    protected $table = 'stockcode';
    protected $fillable = [
        'stock_code',
        'price_code',
        'item_name',
        'class',
        'current_class',
        'mnemonic_current',
        'pn_current',
        'pn_global',
        'wh',
        'uoi'
    ];
}
