<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Pembayaran;
use App\Pendaftaran;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        return view('pembayaran.pembayaran2', [
            'sess' => $req->sess,
        ]);
        // $data_pembayaran = \App\pembayaran::all();
        // return view('pembayaran.view',compact('data_pembayaran'));
    }

    public function lihat(Request $req)
    {
        $id = $req->input('id');
        $sess = $req->sess;



        $list_pembayaran = Pembayaran::where([
            'id_user' => $sess['id'],
            'id' => $id,
        ])->get()->toArray();

        if (count($list_pembayaran) < 1) {
            return view('pembayaran.data_tidak_valid', ['sess' => $sess]);
        }

        $pembayaran = $list_pembayaran[0];

        return view('pembayaran.lihat', ['sess' => $sess, 'data' => $pembayaran]);
    }

    public function success(Request $req)
    {
        return view('pembayaran.success', ['sess' => $req->sess]);
    }

    public function semua(Request $req)
    {
        $sess = $req->sess;
        $id = $sess['id'];

        $mDaftar = new Pendaftaran();
        $mBayar = new Pembayaran();

        $rows = DB::table($mBayar->getTable() . ' as bayar')
            ->leftJoin($mDaftar->getTable() . ' as daftar', 'daftar.id_bayar', '=', 'bayar.id')
            ->where([
                'bayar.id_user' => $sess['id'],
                // 'bayar.id' => $id,
            ])
            ->select('bayar.*', 'daftar.id as id_daftar')
            ->get();
        
        $rows2 = [];
        foreach($rows as $row)
        {
            $rows2[] = (array) $row;
        }
        $rows = $rows2;
        
        // print_r($rows);
        // exit();

        // $rows = Pembayaran::where([
        //     'id_user' => $id,
        // ])->get()->toArray();

        // var_dump($rows);
        // print_r($rows);
        // exit();

        return view('pembayaran.semua', [
            'sess' => $req->sess,
            'rows' => $rows,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pembayaran.pembayaran');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        // \App\pembayaran::create($request->all());
        $berkas = $req->file('lampiran');
        if ($berkas == null) {
            return redirect()->back()->with('errmsg', 'bukti pembayaran harus dilampirkan')->withInput();
        }

        $ext = $berkas->extension();
        $ext = strtolower($ext);
        if (in_array($ext, ['jpg', 'png', 'jpeg', 'bmp', 'pdf']) == false) {
            return redirect()->back()->with('errmsg', 'bukti pembayaran harus berupa gambar atau pdf')->withInput();
        }
        // print_r($ext);

        // print_r($berkas);
        // exit();

        $sess = $req->sess;
        $id = $sess['id'];


        // $berkas->move($tujuan_upload, )

        $ts = Carbon::now();

        $data = [
            'nama' => $req->post('nama'),
            'bank' => $req->post('bank'),
            'verifikasi' => 1,
            'lampiran' => '',
            'created_at' => $ts,
            'updated_at' => $ts,
            'id_user' => $id,
        ];

        $idBayar = Pembayaran::insertGetId($data);

        $folder_upload = '/uploads/' . date('Y') . '/' . date('m') . '/' . date('d') . '/bayar/' . $id . '/';
        $tujuan_upload = public_path() .  $folder_upload;
        $file_tujuan = $idBayar . '_' . $berkas->getClientOriginalName();

        $moved = $berkas->move($tujuan_upload, $file_tujuan);

        Pembayaran::where('id', $idBayar)->update([
            'lampiran' => $folder_upload . $file_tujuan,
        ]);

        // echo $idBayar;
        return redirect('/pembayaran/success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus(Request $req)
    {
        $id = $req->post('id');
        $sess = $req->sess;

        $items = Pembayaran::where('id', $id)->get()->toArray();

        if (count($items) == 0) {
            return redirect()->back()->with('errmsg', 'data tidak ditemukan');
        }
        $item = $items[0];

        if ($item['id_user'] != $sess['id']) {
            return redirect()->back()->with('errmsg', 'tidak dapat menghapus data milik orang lain');
        }

        if ($item['verifikasi'] != '1') {
            return redirect()->back()->with('errmsg', 'data pembayaran tidak dapat dihapus karena sudah diverifikasi');
        }

        Pembayaran::where('id', $id)->delete();
        return redirect()->back()->with('msg', 'data berhasil dihapus');
    }

    // public function verifikasi($id)
    // {
    //     $pembayaran = \App\pembayaran::find($id);

    //     $verifikasi_sekarang = $pembayaran->verifikasi;

    //     if ($verifikasi_sekarang == 1) {
    //         \App\pembayaran::find($id)->update([
    //             'verifikasi' => 0
    //         ]);
    //     } else {
    //         \App\pembayaran::find($id)->update([
    //             'verifikasi' => 1
    //         ]);
    //     }
    //     return redirect('pembayaran');
    // }
}
