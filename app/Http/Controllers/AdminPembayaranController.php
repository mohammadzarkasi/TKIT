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

    public function lihat(Request $req)
    {
        $id = $req->input('id');
        $sess = $req->sess;

        $list_pembayaran = Pembayaran::where('id', $id)->get()->toArray();

        if(count($list_pembayaran) < 1)
        {
            return view('admin.data_not_found', ['sess' => $sess]);
        }
        $pembayaran = $list_pembayaran[0];
        return view('admin.pembayaran.lihat', ['sess' => $sess, 'data' => $pembayaran]);
    }

    public function verifikasi(Request $req)
    {
        $id = $req->input('id');
        $sess = $req->sess;

        $list_pembayaran = Pembayaran::where('id', $id)->get()->toArray();

        if(count($list_pembayaran) < 1)
        {
            return view('admin.data_not_found', ['sess' => $sess]);
        }
        $pembayaran = $list_pembayaran[0];

        Pembayaran::where('id', $id)->update(['verifikasi' => 2]);
        
        return redirect()->back();
    }

    public function terverifikasi(Request $req)
    {
        $list_pembayaran = Pembayaran::where([
            'verifikasi' => 2,
        ])->get()->toArray();
        return view('admin.pembayaran.terverifikasi', [
            'sess' => $req->sess,
            'list_pembayaran' => $list_pembayaran,
        ]);
    }
}
