<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Pembayaran;
use Carbon\Carbon;

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

    public function success(Request $req)
    {
        return view('pembayaran.success', ['sess' => $req->sess]);
    }

    public function semua(Request $req)
    {
        $sess = $req->sess;
        $id = $sess['id'];
        $rows = Pembayaran::where([
            'id_user' => $id,
            ])
            ->get()->toArray();
            
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

        $tujuan_upload = public_path() .  '/uploads/' . date('Y') . '/' . date('m') . '/' . date('d') . '/bayar/' . $id . '/';

        $berkas->move($tujuan_upload, $idBayar . '_' . $berkas->getClientOriginalName());

        // echo $idBayar;
        return redirect('/pembayaran/success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function verifikasi($id)
    {
        $pembayaran = \App\pembayaran::find($id);

        $verifikasi_sekarang = $pembayaran->verifikasi;

        if ($verifikasi_sekarang == 1) {
            \App\pembayaran::find($id)->update([
                'verifikasi' => 0
            ]);
        } else {
            \App\pembayaran::find($id)->update([
                'verifikasi' => 1
            ]);
        }
        return redirect('pembayaran');
    }
}
