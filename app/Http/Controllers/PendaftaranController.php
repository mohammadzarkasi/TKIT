<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\pendaftaranExport;
use App\Pembayaran;
use Maatwebsite\Excel\Facades\Excel;

class PendaftaranController extends Controller
{
    public function index(Request $req)
    {
        // $data_pendaftaran = \App\pendaftaran::all();
        // return view('pendaftaran.index',compact('data_pendaftaran'));
        $sess = $req->sess;
        $id = $sess['id'];
        $list_pembayaran = Pembayaran::where([
            'id_user' => $id,
        ])
            ->where(function ($query) {
                $query->whereIn('verifikasi', [1, 2]);
            })
            ->get()->toArray();

        $jumlah_pembayaran = count($list_pembayaran);

        if ($jumlah_pembayaran == 0) {
            return redirect('/pendaftaran/bayar-dulu');
        }

        if ($jumlah_pembayaran == 1) {
            $bayar = $list_pembayaran[0];
            return redirect('/pendaftaran/baru?bayar=' . $bayar['id']);
        }

        return view('pendaftaran.pilih_bayar', [
            'sess' => $sess,
        ]);
    }

    public function bayar_dulu(Request $req)
    {
        return view('pendaftaran.bayar_dulu', ['sess' => $req->sess]);
    }

    public function create(Request $req)
    {
        // return view('pendaftaran.create');
        return view('pendaftaran.create2', [
            'sess' =>$req->sess,
        ]);

        //return redirect('/pendaftaran')->with('sukses','Berhasil mengisi pendaftaran, silahkan menunggu konfirmasi');
    }

    public function store(Request $request)
    {
        \App\pendaftaran::create($request->all());
        return redirect('/');
    }
    public function detail($id)
    {
        $pendaftaran = \App\pendaftaran::find($id);
        return view('pendaftaran.detail', ['pendaftaran' => $pendaftaran]);
    }
    public function export()
    {
        return Excel::download(new pendaftaranExport, 'Pendaftaran.xlsx');
    }

    public function verifikasi($id)
    {
        $pendaftaran = \App\pendaftaran::find($id);

        $verifikasi_sekarang = $pendaftaran->verifikasi;

        if ($verifikasi_sekarang == 1) {
            \App\pendaftaran::find($id)->update([
                'verifikasi' => 0
            ]);
        } else {
            \App\pendaftaran::find($id)->update([
                'verifikasi' => 1
            ]);
        }
        return redirect('pendaftaran');
    }
}
