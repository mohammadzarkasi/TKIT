<?php

namespace App\Http\Controllers;

use App\Pembayaran;
use App\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    public function index(Request $req)
    {
        
        $data = [
            'bayar_1' => 0,
            'bayar_2' => 0,
            'daftar_1' => 0,
            'daftar_2' => 0,
        ];

        $hitungs = Pembayaran::select('verifikasi', DB::raw('count(*) as jumlah'))
            ->groupBy('verifikasi')->get()->toArray();
        foreach($hitungs as $hitung)
        {
            $data['bayar_' . $hitung['verifikasi']] = $hitung['jumlah'];
        }
        $hitungs = Pendaftaran::select('verifikasi', DB::raw('count(*) as jumlah'))
            ->groupBy('verifikasi')->get()->toArray();
        foreach($hitungs as $hitung)
        {
            $data['daftar_' . $hitung['verifikasi']] = $hitung['jumlah'];
        }

        // print_r($data);
        // exit();
        return view('admin.home', ['sess' => $req->sess, 'data' => $data]);
    }
}
