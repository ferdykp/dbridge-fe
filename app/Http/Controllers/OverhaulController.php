<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Overhaul;
use App\Models\StockCode;
use App\Exports\OverhaulExport;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use App\Imports\OverhaulImport; // Import WrImport yang akan dibuat nanti



class OverhaulController extends Controller
{
    public function index()
    {
        // $overhaul = Overhaul::all();
        $overhaul = Overhaul::paginate(10);
        $type = 'overhaul';
        return view('overhaul', compact('overhaul', 'type'));
    }
    public function create()
    {
        // $bcs = Wr::all();
        $stockCode = StockCode::all();
        // return view('create', compact('stockCode'));
        return view('create', ['type' => 'overhaul'], compact('overhaul'));

        // return view('create', compact('bcs'));
    }

    public function show(string $id): View
    {
        $overhaul = Overhaul::findOrFail($id);
        return view('overhaul', compact('overhaul'));
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

        Overhaul::create($request->all());

        return redirect()->route('overhaul')->with(['success' => 'Data Berhasil Ditambahkan!']);
    }

    public function edit(string $id): View
    {
        $data = Overhaul::findOrFail($id);
        $stockCode = StockCode::all();

        return view('edit', compact('data', 'stockCode'))->with('type', 'wr');
        // return view('wr.edit', compact('wr', 'stockCode'));
        // return view('edit', compact(['type' => 'wr'], 'stockCode'));
        // return view('edit', compact('stockCode'))->with('type', 'wr');

        // return view('edit', compact('wr', 'stockCode'))->with('type', 'wr');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'dstrc_ori' => 'required',
            'creation_date' => 'required',
            'authsd_date' => 'required',
            'wo_desc' => 'required',
            'acuan_plan_service' => 'required',
            'componen_desc' => 'required',
            'egi' => 'required',
            'egi_eng' => 'required',
            'equip_no' => 'required',
            'plant_process' => 'required',
            'plant_activity' => 'required',
            'wr_no' => 'required',
            'wr_item' => 'required',
            'qty_req' => 'required',
            'stock_code' => 'required',
            'mnemonic' => 'required',
            'part_number' => 'required',
            'pn_global' => 'required',
            'item_name' => 'required',
            'stock_type_district' => 'required',
            'class' => 'required',
            'home_wh' => 'required',
            'uoi' => 'required',
            'issuing_price' => 'required',
            'price_code' => 'required',
            'notes' => 'nullable',
            'eta' => 'nullable',
            'status' => 'required'
        ]);

        $overhaul = Overhaul::findOrFail($id);
        $overhaul->update($request->all());

        return redirect()->route('dashboard')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $overhaul = Overhaul::findOrFail($id);
        $overhaul->delete();

        return redirect()->route('overhaul')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function export()
    {
        return Excel::download(new OverhaulExport, 'Data Overhaul.xlsx');
    }

    public function import(Request $request)
    {
        // Validasi file Excel yang diupload
        $request->validate([
            'file' => 'required|mimes:xlsx,csv', // Menjamin hanya file Excel yang bisa diupload
        ]);

        // Import file Excel
        Excel::import(new OverhaulImport, $request->file('file'));

        // Redirect kembali ke dashboard dengan pesan sukses
        return redirect()->route('overhaul')->with(['success' => 'Data Overhaul berhasil diimport!']);
    }

    public function search(Request $request)
    {
        $query = $request->input('search');

        $data = Overhaul::where('wr_no', 'LIKE', "%{$query}%")
            ->orWhere('wo_desc', 'LIKE', "%{$query}%")
            ->paginate(10);

        return view('partials.wr_table', [
            'data' => $data,
            'routePrefix' => 'overhaul' // Sesuaikan dengan prefix masing-masing controller
        ]);
    }
    public function bulkDelete(Request $request)
    {
        try {
            $ids = $request->input('ids', []);
            if (empty($ids)) {
                return response()->json(['success' => false, 'message' => 'Tidak ada data yang dipilih.']);
            }

            Overhaul::whereIn('id', $ids)->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
