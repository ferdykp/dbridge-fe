<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bcs;

class BcsController extends Controller
{
    public function index()
    {
        // $bcs = Bcs::all()->simplePaginate(10);
        $bcs = Bcs::simplePaginate(10);
        return view('bcs', compact('bcs'));
    }
}
