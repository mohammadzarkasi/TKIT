<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPendaftaranController extends Controller
{
    public function baru(Request $req)
    {
        return view('admin.pendaftaran.baru', ['sess' => $req->sess]);
    }

    public function terverifikasi(Request $req)
    {
        return view('admin.pendaftaran.terverifikasi', ['sess' => $req->sess]);
    }

}
