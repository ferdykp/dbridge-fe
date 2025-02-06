<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodic;
use App\Models\StockCode;
use App\Exports\PeriodicExport;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use App\Imports\PeriodicImport; // Import WrImport yang akan dibuat nanti

class PeriodicController extends Controller
{
    public function index()
    {
        $periodic = Periodic::all();
        return view('periodic', compact('periodic'));
    }
    public function create()
    {
        // $bcs = Wr::all();
        $stockCode = StockCode::all();
        // return view('create', compact('stockCode'));
        return view('create', ['type' => 'periodic'], compact('stockCode'));

        // return view('create', compact('bcs'));
    }

        public function show(string $id): View
    {
        $periodic = Periodic::findOrFail($id);
        return view('show', compact('periodic'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'dstrc_ori' => 'nullable',
            'creation_date' => 'nullable',
            'authsd_date' => 'nullable',
            'wo_desc' => 'nullable',
            'acuan_plan_service' => 'nullable',
            'componen_desc' => 'nullable',
            'egi' => 'nullable',
            'egi_eng' => 'nullable',
            'equip_no' => 'nullable',
            'plant_process' => 'nullable',
            'plant_activity' => 'nullable',
            'wr_no' => 'nullable',
            'wr_item' => 'nullable',
            'qty_req' => 'nullable',
            'stock_code' => 'nullable',
            'mnemonic' => 'nullable',
            'part_number' => 'nullable',
            'pn_global' => 'nullable',
            'item_name' => 'nullable',
            'stock_type_district' => 'nullable',
            'class' => 'nullable',
            'home_wh' => 'nullable',
            'uoi' => 'nullable',
            'issuing_price' => 'nullable',
            'price_code' => 'nullable',
            'notes' => 'nullable',
            'eta' => 'nullable',
            'status' => 'nullable',
        ]);

        Periodic::create($request->all());

        return redirect()->route('periodic')->with(['success' => 'Data Berhasil Ditambahkan!']);
    }
    public function destroy($id): RedirectResponse
    {
        $periodic = Periodic::findOrFail($id);
        $periodic->delete();

        return redirect()->route('periodic')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function export()
    {
        return Excel::download(new PeriodicExport, 'Data Periodic.xlsx');
    }

    public function import(Request $request)
    {
        // Validasi file Excel yang diupload
        $request->validate([
            'file' => 'required|mimes:xlsx,csv', // Menjamin hanya file Excel yang bisa diupload
        ]);

        // Import file Excel
        Excel::import(new PeriodicImport, $request->file('file'));

        // Redirect kembali ke dashboard dengan pesan sukses
        return redirect()->route('periodic')->with(['success' => 'Data Periodic berhasil diimport!']);
    }
}