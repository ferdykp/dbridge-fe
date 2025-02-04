<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Overhaul;

class OverhaulController extends Controller
{
    public function index()
    {
        $overhaul = Overhaul::all();
        return view('overhaul', compact('overhaul'));
    }
}
