<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockCode;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StockCodeImport;
use Illuminate\Support\Illuminate\Database;

class StockCodeController extends Controller
{
    public function getStockData($stock_code)
    {
        $stockCode = StockCode::where('stock_code', $stock_code)->first();

        if ($stockCode) {
            return response()->json($stockCode);
        }

        return response()->json(['message' => 'Stock Code not found'], 404);
    }
    public function store(Request $request)
    {
        // Lawas
        // $validatedData = $request->validate([
        //     'stock_code' => 'required|unique:stockcode,stock_code', // Menambahkan validasi unik
        //     'mnemonic' => 'required',
        //     'part_number' => 'required',
        //     'pn_global' => 'required',
        //     'item_name' => 'required',
        //     'stock_type_district' => 'required',
        //     'class' => 'required',
        //     'home_wh' => 'required',
        //     'uoi' => 'required',
        //     'issuing_price' => 'required|numeric',
        //     'price_code' => 'required'
        // ]);

        // StockCode::create($validatedData);

        // return redirect()->route('dashboard')->with('success', 'Stock code berhasil ditambahkan!');

        // Baru (Bulk Insert)
        $request->validate([
            'stock_codes.*.stock_code' => 'required|unique:stockcode,stock_code',
            'stock_codes.*.mnemonic' => 'required',
            'stock_codes.*.part_number' => 'required',
            'stock_codes.*.pn_global' => 'required',
            'stock_codes.*.item_name' => 'required',
            'stock_codes.*.stock_type_district' => 'required',
            'stock_codes.*.class' => 'required',
            'stock_codes.*.home_wh' => 'required',
            'stock_codes.*.uoi' => 'required',
            'stock_codes.*.issuing_price' => 'required|numeric',
            'stock_codes.*.price_code' => 'required',
        ]);

        // Ambil semua data dari form
        $stockCodes = $request->input('stock_codes');

        // Insert data secara massal
        StockCode::insert($stockCodes);

        // Redirect kembali ke dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Stock codes berhasil ditambahkan!');
    }

    public function index()
    {
        $stockCode = StockCode::paginate(10);

        // dd($stockCode);
        return view('stockcode', compact('stockCode'));
    }

    public function edit($id)
    {
        $stockCode = StockCode::findOrFail($id);
        return view('editstockcode', compact('stockCode'));
    }
public function update(Request $request, StockCode $stockCode)
    {
        // $stockCode = StockCode::findOrFail($stockCode);

        // Validasi input
        $validatedData = $request->validate([
            'stock_code' => 'required|string',
            'mnemonic' => 'required|string',
            'part_number' => 'required|string',
            'pn_global' => 'required|string',
            'item_name' => 'required|string',
            'stock_type_district' => 'required|string',
            'class' => 'required|string',
            'home_wh' => 'required|string',
            'uoi' => 'required|string',
            'issuing_price' => 'required|numeric',
            'price_code' => 'required|string'
        ]);

        // Update data stock code
        $stockCode->update($validatedData);

        // Redirect kembali ke daftar stock codes dengan pesan sukses
        return redirect()->route('stockCode.index')->with('success', 'Stock Code berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $stockCode = StockCode::findOrFail($id);
        $stockCode->delete(); // Menghapus data stock code

        // Redirect kembali dengan pesan sukses
        return redirect()->route('stockCode.index')->with('success', 'Stock Code berhasil dihapus!');
    }
    public function create()
    {
        // Mengambil data dari tabel stockcode menggunakan Eloquent
        $stockCode = StockCode::all();

        // dd($stockCode);
        // Mengirimkan data ke view create
        return view('addstockcode', compact('stockCode'));
    }

    // Fungsi untuk menampilkan form import
    public function showImportForm()
    {
        return view('stockCode.index');
    }

    // Fungsi untuk menangani proses import
    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new StockCodeImport, $request->file('file'));

        return redirect()->route('dashboard')->with('success', 'Stock Codes berhasil diimport!');
    }

public function search(Request $request)
{
    $search = $request->input('search');
    
    $stockCode = StockCode::where('stock_code', 'like', "%{$search}%")
                    ->orWhere('item_name', 'like', "%{$search}%")
                    ->orWhere('mnemonic', 'like', "%{$search}%")
                    ->get();

    return view('partials.stock_table', compact('stockCode'));
}


}