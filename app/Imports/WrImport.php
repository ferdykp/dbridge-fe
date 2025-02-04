<?php

namespace App\Imports;

use App\Models\wr;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

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
        // Mengonversi nilai numerik (serial date Excel) menjadi tanggal yang dapat dipahami
        if (is_numeric($row['creation_date'])) {
            $row['creation_date'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['creation_date'])->format('Y-m-d');
        }

        if (is_numeric($row['authsd_date'])) {
            $row['authsd_date'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['authsd_date'])->format('Y-m-d');
        }

        if (is_numeric($row['acuan_plan_service'])) {
            $row['acuan_plan_service'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['acuan_plan_service'])->format('Y-m-d');
        }

        if (is_numeric($row['eta'])) {
            $row['eta'] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['eta'])->format('Y-m-d');
        }

        return new wr([
            'dstrc_ori' => $row['dstrc_ori'],
            'creation_date' => Carbon::parse($row['creation_date'])->format('Y-m-d H:i:s'),
            'authsd_date' => Carbon::parse($row['authsd_date'])->format('Y-m-d H:i:s'),
            'wo_desc' => $row['wo_desc'],
            'acuan_plan_service' => Carbon::parse($row['acuan_plan_service'])->format('Y-m-d H:i:s'),
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
            'eta' => Carbon::parse($row['eta'])->format('Y-m-d H:i:s'),
            'status' => $row['status'],
        ]);
    }
}
