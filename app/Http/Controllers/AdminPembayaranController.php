<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPembayaranController extends Controller
{
    public function baru(Request $req)
    {
        return view('admin.pembayaran.baru', ['sess' => $req->sess]);
    }

    public function terverifikasi(Request $req)
    {
        return view('admin.pembayaran.terverifikasi', ['sess' => $req->sess]);
    }
}
