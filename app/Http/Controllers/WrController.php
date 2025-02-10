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
use Illuminate\Support\Facades\Schema;


class WrController extends Controller
{
    public function index(): View
    {
        $role = Auth::user()->role; // Mendapatkan role user yang sedang login
        $wrQuery = Wr::query();

        $type = 'wr';

        // Filter berdasarkan role
        if ($role === 'supplier') {
            $wrQuery->where('home_wh', 'UTVH'); // Hanya data dengan WH = UTVH
        }

        // Gunakan paginate untuk mendapatkan pagination lengkap
        $wr = $wrQuery->latest()->paginate(10);

        // Redirect sesuai dengan role user
        if ($role === 'sm') {
            return view('adminDashboard', compact('wr', 'type'));
        } elseif ($role === 'supplier') {
            return view('supplierDashboard', compact('wr', 'type'));
        } elseif ($role === 'user') {
            return view('userDashboard', compact('wr', 'type'));
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
        $data = Wr::findOrFail($id);
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
            'status' => 'nullable'
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

    // public function destroyMultiple(Request $request)
    // {
    //     $ids = $request->input('ids');

    //     if (!is_array($ids) || empty($ids)) {
    //         return response()->json(['success' => false, 'message' => 'No data selected.']);
    //     }

    //     Wr::whereIn('id', $ids)->delete();

    //     return response()->json(['success' => true, 'message' => 'Selected records deleted successfully.']);
    // }


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
    public function search(Request $request)
    {
        $query = $request->input('search');

        $data = Wr::where(function ($q) use ($query) {
            foreach (Schema::getColumnListing('wr') as $column) {
                $q->orWhere($column, 'LIKE', "%{$query}%");
            }
        })
            ->paginate(10);

        return view('partials.wr_table', [
            'data' => $data,
            'routePrefix' => 'wr' // Sesuaikan dengan prefix masing-masing controller
        ]);
    }
    public function bulkDelete(Request $request)
    {
        try {
            $ids = $request->input('ids', []);
            if (empty($ids)) {
                return response()->json(['success' => false, 'message' => 'Tidak ada data yang dipilih.']);
            }

            Wr::whereIn('id', $ids)->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
