<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Midlife;

class MidlifeController extends Controller
{
    public function index()
    {
        $midlife = Midlife::all();
        return view('midlife', compact('midlife'));
    }
}
