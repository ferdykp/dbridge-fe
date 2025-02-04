<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bcs;

class BcsController extends Controller
{
    public function index()
    {
        $bcs = Bcs::all();
        return view('bcs', compact('bcs'));
    }
}
