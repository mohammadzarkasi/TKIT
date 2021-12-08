<?php

namespace App\Http\Controllers;

use App\Pembayaran;
use Illuminate\Http\Request;

class AdminPembayaranController extends Controller
{
    public function baru(Request $req)
    {
        $list_pembayaran = Pembayaran::where([
            'verifikasi' => 1,
        ])->get()->toArray();
        return view('admin.pembayaran.baru', [
            'sess' => $req->sess, 
            'list_pembayaran' => $list_pembayaran,
        ]);
    }

    public function terverifikasi(Request $req)
    {
        return view('admin.pembayaran.terverifikasi', ['sess' => $req->sess]);
    }
}
