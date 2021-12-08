<?php

namespace App\Http\Controllers;

use App\Pendaftaran;
use Illuminate\Http\Request;

class AdminPendaftaranController extends Controller
{
    public function baru(Request $req)
    {
        $list_pendaftaran = Pendaftaran::where([
            'verifikasi' => 1
        ])->get()->toArray();
        return view('admin.pendaftaran.baru', [
            'sess' => $req->sess,
            'list_pendaftaran' => $list_pendaftaran,
        ]);
    }

    public function terverifikasi(Request $req)
    {
        $list_pendaftaran = Pendaftaran::where([
            'verifikasi' => 2
        ])->get()->toArray();
        return view('admin.pendaftaran.terverifikasi', [
            'sess' => $req->sess,
            'list_pendaftaran' => $list_pendaftaran,
        ]);
    }

}
