<?php

namespace App\Exports;

use App\Models\Periodic;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PeriodicExport implements FromCollection, WithHeadings
{
    /**
     * Mengembalikan koleksi data untuk diekspor.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Mengambil data dari model Barang
        return Periodic::select("dstrct_ori", "creation_date", "authsd_date", "wo_desc", "acuan_plan_service", "componen_desc", "egi", "egi_eng", "equip_no", "plant_process", "plant_activity", "wr_no", "wr_item", "qty_req")->get();
    }

    /**
     * Mendefinisikan header untuk file Excel.
     *
     * @return array
     */
    public function headings(): array
    {
        return ["DSTRCT_ORI", "CREATION_DATE", "AUTHSD_DATE", "WO_DESC", "ACUAN_PLAN_SERVICE", "COMPONEN_DESC", "EGI", "EGI_ENG", "EQUIP_NO", "PLANT_PROCESS", "PLANT_ACTIVITY", "WR_NO", "WR_ITEM", "QTY_REQ"];
    }
}
