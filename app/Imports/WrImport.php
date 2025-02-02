<?php

namespace App\Imports;

use App\Models\wr;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WrImport implements ToModel, WithHeadingRow
{
    /**
     * Method untuk mengekspor setiap baris data dari file Excel ke database.
     *
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new wr([
            'dstrc_ori' => $row['dstrc_ori'],
            'creation_date' => $row['creation_date'],
            'authsd_date' => $row['authsd_date'],
            'wo_desc' => $row['wo_desc'],
            'acuan_plan_service' => $row['acuan_plan_service'],
            'componen_desc' => $row['componen_desc'],
            'egi' => $row['egi'],
            'egi_eng' => $row['egi_eng'],
            'equip_no' => $row['equip_no'],
            'plant_process' => $row['plant_process'],
            'plant_activity' => $row['plant_activity'],
            'wr_no' => $row['wr_no'],
            'wr_item' => $row['wr_item'],
            'qty_req' => $row['qty_req'],
            'stock_code' => $row['stock_code'],
            'mnemonic' => $row['mnemonic'],
            'part_number' => $row['part_number'],
            'pn_global' => $row['pn_global'],
            'item_name' => $row['item_name'],
            'stock_type_district' => $row['stock_type_district'],
            'class' => $row['class'],
            'home_wh' => $row['home_wh'],
            'uoi' => $row['uoi'],
            'issuing_price' => $row['issuing_price'],
            'price_code' => $row['price_code'],
            'notes' => $row['notes'],
            'eta' => $row['eta'],
            'status' => $row['status'],
        ]);
    }
}