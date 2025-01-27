<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        // echo 'hello';
        return view('login');
    }

    function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Email wajib diisi',
                'password.required' => 'Password wajib diisi'
            ]
        );
        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            // return redirect('dashboard');
            if (Auth::user()->role == 'user') {
                return redirect('dashboard/user');
            } elseif (Auth::user()->role == 'supplier') {
                return redirect('dashboard/supplier');
            } elseif (Auth::user()->role == 'sm') {
                return redirect('dashboard/admin');
            }
        } else {
            return redirect('')->withErrors('Email atau Password salah')->withInput();
        }
    }
    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
