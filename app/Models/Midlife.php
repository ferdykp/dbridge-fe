<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Midlife extends Model
{
    use HasFactory;
    protected $table = 'midlife';

    protected $fillable = [
        'dstrct_ori',
        'creation_date',
        'authsd_date',
        'wo_desc',
        'acuan_plan_service',
        'componen_desc',
        'egi',
        'egi_eng',
        'equip_no',
        'plant_process',
        'plant_activity',
        'wr_no',
        'wr_item',
        'qty_req',
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
        'notes',
        'eta',
        'status'
    ];
}
