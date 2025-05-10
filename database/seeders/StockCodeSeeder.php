<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class StockCodeSeeder extends Seeder
{
    public function run(): void
    {
        // Path ke file CSV
        $filePath = database_path('../DATA STOCKCODE LEVEL DISTRICT (5).csv');

        // Baca file menggunakan Laravel Excel
        $data = Excel::toArray([], $filePath)[0]; // Ambil sheet pertama

        // Loop data dan insert ke database
        foreach ($data as $index => $row) {
            // Lewati header jika ada
            if ($index === 0) {
                continue;
            }

            DB::table('stockcode')->insert([
                'stock_code' => $row[0],  // Sesuaikan indeks dengan urutan kolom di CSV Anda
                'mnemonic' => $row[1],
                'part_number' => $row[2],
                'pn_global' => $row[3],
                'item_name' => $row[4],
                'stock_type_district' => $row[5],
                'class' => $row[6],
                'home_wh' => $row[7],
                'uoi' => $row[8],
                'issuing_price' => $this->formatPrice($row[9]),
                'price_code' => $row[10],
            ]);
        }
    }
    private function formatPrice($price)
    {
        // Hapus pemisah ribuan (titik)
        $cleanedPrice = str_replace('.', '', $price);

        // Ganti koma dengan titik untuk desimal
        $cleanedPrice = str_replace(',', '.', $cleanedPrice);

        // Konversi ke angka desimal
        return is_numeric($cleanedPrice) ? number_format((float) $cleanedPrice, 2, '.', '') : 0.00;
    }
}
