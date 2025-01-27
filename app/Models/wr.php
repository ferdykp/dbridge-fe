<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wr extends Model
{
    use HasFactory;
    protected $table = 'wr';

    protected $fillable = [
        'dstrc_ori',
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
        'price_code',
        'item_name',
        'class',
        'current_class',
        'mnemonic_current',
        'pn_current',
        'pn_global',
        'wh',
        'uoi',
        'notes',
        'status'
    ];
}
