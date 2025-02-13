<?php

namespace App\Exports;

use App\Models\Midlife;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MidlifeExport implements FromCollection, WithHeadings
{
    /**
     * Mengembalikan koleksi data untuk diekspor.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Mengambil data dari model Barang
        return Midlife::select(
            "dstrct_ori",
            "creation_date",
            "authsd_date",
            "wo_desc",
            "acuan_plan_service",
            "componen_desc",
            "egi",
            "egi_eng",
            "equip_no",
            "plant_process",
            "eta",
            "plant_activity",
            "wr_no",
            "wr_item",
            "qty_req",
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
            "notes",
            "status"
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
            "DSTRCT_ORI",
            "CREATION_DATE",
            "AUTHSD_DATE",
            "WO_DESC",
            "ACUAN_PLAN_SERVICE",
            "COMPONEN_DESC",
            "EGI",
            "EGI_ENG",
            "EQUIP_NO",
            "PLANT_PROCESS",
            "ETA",
            "PLANT_ACTIVITY",
            "WR_NO",
            "WR_ITEM",
            "QTY_REQ",
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
            "Notes",
            "Status"
        ];
    }
}
