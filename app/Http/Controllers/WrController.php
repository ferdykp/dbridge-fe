<?php

namespace App\Http\Controllers;

use App\Models\wr;
use App\Models\StockCode;
use App\Exports\WrExport;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use App\Imports\WrImport; // Import WrImport yang akan dibuat nanti

class WrController extends Controller
{
    public function index(): View
    {
        $role = Auth::user()->role; // Mendapatkan role user yang sedang login
        $wrQuery = Wr::query();

        // Filter berdasarkan role
        if ($role === 'supplier') {
            $wrQuery->where('home_wh', 'UTVH'); // Hanya data dengan WH = UTVH
        }

        $wr = $wrQuery->latest()->simplePaginate(10);

        if ($role === 'sm') {
            return view('adminDashboard', compact('wr'));
        } elseif ($role === 'supplier') {
            return view('supplierDashboard', compact('wr'));
        } elseif ($role === 'user') {
            return view('userDashboard', compact('wr'));
        } else {
            return view('login')->with(['error' => 'Belum Terdaftar!']);
        }
    }
    public function create()
    {
        // $wr = Wr::all();
        $stockCode = StockCode::all();
        // return view('create', compact('stockCode'));
        return view('create', ['type' => 'wr'], compact('stockCode'));

        // return view('create', compact('wr'));
    }

    public function store(Request $request): RedirectResponse
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
            'status' => 'required',
        ]);

        Wr::create($request->all());

        return redirect()->route('dashboard')->with(['success' => 'Data Berhasil Ditambahkan!']);
    }

    public function show(string $id): View
    {
        $wr = Wr::findOrFail($id);
        return view('show', compact('wr'));
    }

    public function edit(string $id): View
    {
        $wr = Wr::findOrFail($id);
        $stockCode = StockCode::all();
        return view('tes', compact('wr', 'stockCode'));
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

        $wr = Wr::findOrFail($id);
        $wr->update($request->all());

        return redirect()->route('dashboard')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $wr = Wr::findOrFail($id);
        $wr->delete();

        return redirect()->route('dashboard')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function export()
    {
        return Excel::download(new WrExport, 'Data WR.xlsx');
    }

    public function import(Request $request)
    {
        // Validasi file Excel yang diupload
        $request->validate([
            'file' => 'required|mimes:xlsx,csv', // Menjamin hanya file Excel yang bisa diupload
        ]);

        // Import file Excel
        Excel::import(new WrImport, $request->file('file'));

        // Redirect kembali ke dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with(['success' => 'Data WR berhasil diimport!']);
    }
}