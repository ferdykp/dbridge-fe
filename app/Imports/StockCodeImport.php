<?php

namespace App\Imports;

use App\Models\StockCode;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StockCodeImport implements ToModel, WithHeadingRow
{
public function model(array $row)
{
    \Log::info($row); // Tambahkan log untuk melihat isi row
    return new StockCode([
        'stock_code' => $row['stock_code'] ?? null, // Menambahkan pengecekan jika key tidak ditemukan
        'mnemonic' => $row['mnemonic'] ?? null,
        'part_number' => $row['part_number'] ?? null,
        'pn_global' => $row['pn_global'] ?? null,
        'item_name' => $row['item_name'] ?? null,
        'stock_type_district' => $row['stock_type_district'] ?? null,
        'class' => $row['class'] ?? null,
        'home_wh' => $row['home_wh'] ?? null,
        'uoi' => $row['uoi'] ?? null,
        'issuing_price' => $row['issuing_price'] ?? null,
        'price_code' => $row['price_code'] ?? null,
    ]);
}
    }