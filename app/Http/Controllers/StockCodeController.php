<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockCode;
use Illuminate\Support\Facades\DB;

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
        // Validasi input
        $validatedData = $request->validate([
            'stock_code' => 'required|string',
            'price_code' => 'required|string',
            'item_name' => 'required|string',
            'class' => 'required|string',
            'current_class' => 'required|string',
            'mnemonic_current' => 'required|string',
            'pn_current' => 'required|string',
            'pn_global' => 'required|string',
            'wh' => 'required|string|',
            'uoi' => 'required|string',
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
            'status' => 'required'
        ]);

        // Menyimpan data ke tabel `stockcode`
        $stockCode = StockCode::create([
            'stock_code' => $validatedData['stock_code'],
            'price_code' => $validatedData['price_code'],
            'item_name' => $validatedData['item_name'],
            'class' => $validatedData['class'],
            'current_class' => $validatedData['current_class'],
            'mnemonic_current' => $validatedData['mnemonic_current'],
            'pn_current' => $validatedData['pn_current'],
            'pn_global' => $validatedData['pn_global'],
            'wh' => $validatedData['wh'],
            'uoi' => $validatedData['uoi'],
        ]);

        // Menyimpan data ke tabel `wr`, referensikan `stock_code_id`
        DB::table('wr')->insert([
            'stock_code_id' => $stockCode->id,  // Foreign key ke `stockcode`
            'dstrc_ori' => $validatedData['dstrc_ori'],
            'creation_date' => $validatedData['creation_date'],
            'authsd_date' => $validatedData['authsd_date'],
            'wo_desc' => $validatedData['wo_desc'],
            'acuan_plan_service' => $validatedData['acuan_plan_service'],
            'componen_desc' => $validatedData['componen_desc'],
            'egi' => $validatedData['egi'],
            'egi_eng' => $validatedData['egi_eng'],
            'equip_no' => $validatedData['equip_no'],
            'plant_process' => $validatedData['plant_process'],
            'plant_activity' => $validatedData['plant_activity'],
            'wr_no' => $validatedData['wr_no'],
            'wr_item' => $validatedData['wr_item'],
            'qty_req' => $validatedData['qty_req'],
            'status' => $validatedData['status'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Stock code berhasil ditambahkan!');
    }
    public function index()
    {
        $stockCode = StockCode::all();

        dd($stockCode);
        return view('create', compact('stockCodes'));
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
            'stock_code' => 'required|string|unique:stockcodes,stock_code,' . $stockCode->id,
            'price_code' => 'nullable|string',
            'item_name' => 'required|string',
            'class' => 'nullable|string',
            'current_class' => 'required|string',
            'mnemonic_current' => 'required|string',
            'pn_current' => 'required|string',
            'pn_global' => 'required|string',
            'wh' => 'required|string',
            'uoi' => 'required|string',
        ]);

        // Update data stock code
        $stockCode->update($validatedData);

        // Redirect kembali ke daftar stock codes dengan pesan sukses
        return redirect()->route('create')->with('success', 'Stock Code berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $stockCode = StockCode::findOrFail($id);
        $stockCode->delete(); // Menghapus data stock code

        // Redirect kembali dengan pesan sukses
        return redirect()->route('create')->with('success', 'Stock Code berhasil dihapus!');
    }
    public function create()
    {
        // Mengambil data dari tabel stockcode menggunakan Eloquent
        $stockCode = StockCode::all();

        dd($stockCode);
        // Mengirimkan data ke view create
        return view('create', compact('stockCode'));
    }
}
