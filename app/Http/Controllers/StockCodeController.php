<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockCode;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
        $validatedData = $request->validate([
            'stock_code' => 'required|unique:stockcode,stock_code', // Menambahkan validasi unik
            'mnemonic' => 'required',
            'part_number' => 'required',
            'pn_global' => 'required',
            'item_name' => 'required',
            'stock_type_district' => 'required',
            'class' => 'required',
            'home_wh' => 'required',
            'uoi' => 'required',
            'issuing_price' => 'required|numeric',
            'price_code' => 'required'
        ]);

        StockCode::create($validatedData);

        return redirect()->route('dashboard')->with('success', 'Stock code berhasil ditambahkan!');
    }

    public function index()
    {
        $stockCode = StockCode::all();

        // dd($stockCode);
        return view('stockcode', compact('stockCode'));
    }

    public function edit($id)
    {
        $stockCode = StockCode::findOrFail($id);
        return view('create', compact('stockCode'));
    }
    public function update(Request $request, $id)
    {
        $stockCode = StockCode::findOrFail($id);

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
        return redirect()->route('dashboard')->with('success', 'Stock Code berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $stockCode = StockCode::findOrFail($id);
        $stockCode->delete(); // Menghapus data stock code

        // Redirect kembali dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Stock Code berhasil dihapus!');
    }
    public function create()
    {
        // Mengambil data dari tabel stockcode menggunakan Eloquent
        $stockCode = StockCode::all();

        // dd($stockCode);
        // Mengirimkan data ke view create
        return view('stockcode', compact('stockCode'));
    }
}
