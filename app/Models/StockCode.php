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
        'mnemonic',
        'part_number',
        'pn_global',
        'item_name',
        'stock_type_district',
        'class',
        'home_wh',
        'uoi',
        'issuing_price',
        'price_code',
    ];
}
