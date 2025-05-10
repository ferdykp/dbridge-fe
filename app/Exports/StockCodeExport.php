<?php

namespace App\Exports;

use App\Models\StockCode;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StockCodeExport implements FromCollection, WithHeadings
{
    /**
     * Mengembalikan koleksi data untuk diekspor.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Mengambil data dari model Barang
        return StockCode::select(
            "stock_code",
            "mnemonic",
            "part_number",
            "pn_global",
            "item_name",
            "stock_type_district",
            "class",
            "home_wh",
            "uoi",
            "issuing_price",
            "price_code",
        )->get();
    }

    /**
     * Mendefinisikan header untuk file Excel.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            "STOCK_CODE",
            "MNEMONIC",
            "PART_NUMBER",
            "PN_GLOBAL",
            "ITEM_NAME",
            "STOCK_TYPE_DISTRICT",
            "CLASS",
            "HOME_WH",
            "UOI",
            "ISSUING_PRICE",
            "PRICE_CODE",
        ];
    }
}
