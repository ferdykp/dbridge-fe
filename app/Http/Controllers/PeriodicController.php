<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodic;

class PeriodicController extends Controller
{
    public function index()
    {
        $periodic = Periodic::all();
        return view('periodic', compact('periodic'));
    }
}
