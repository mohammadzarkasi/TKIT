<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\pendaftaranExport;
use App\Pembayaran;
use App\Pendaftaran;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class PendaftaranController extends Controller
{
    public function index(Request $req)
    {
        $sess = $req->sess;
        $list_pendaftaran = Pendaftaran::where('id_user', $sess['id'])->get()->toArray();
        return view('pendaftaran.semua', [
            'sess' => $sess,
            'list_pendaftaran' => $list_pendaftaran,
        ]);
    }

    public function index2(Request $req)
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

        // if ($jumlah_pembayaran == 1) {
        //     $bayar = $list_pembayaran[0];
        //     return redirect('/pendaftaran/data-pribadi?bayar=' . $bayar['id']);
        // }

        return view('pendaftaran.pilih_bayar', [
            'sess' => $sess,
            'list_pembayaran' => $list_pembayaran,
        ]);
    }

    public function pilih_bayar(Request $req)
    {
        $sess = $req->sess;
        $id = $sess['id'];

        $list_pembayaran = Pembayaran::where([
            'id_user' => $id,
        ])
            ->where(function ($query) {
                $query->whereIn('verifikasi', [1, 2]);
            })
            ->get()->toArray();
        return view('pendaftaran.pilih_bayar', [
            'sess' => $sess,
            'list_pembayaran' => $list_pembayaran,
        ]);
    }

    private function cek_status_pembayaran(Request $req)
    {
        $id_bayar = $req->input('bayar');
        $list_pembayaran = Pembayaran::where('id', $id_bayar)->get()->toArray();
        if (count($list_pembayaran) < 1) {
            // return redirect('/pendaftaran/bayar-tidak-valid');
            return null;
        }
        $pembayaran = $list_pembayaran[0];
        if (in_array($pembayaran['verifikasi'], ['2']) == false) {
            // return redirect('/pendaftaran/bayar-tidak-valid');
            return null;
        }
        return $pembayaran;
    }

    private function get_pendaftaran($pembayaran)
    {
        $list_pendaftaran = Pendaftaran::where('id_bayar', $pembayaran['id'])->get()->toArray();
        if (count($list_pendaftaran) > 0) {
            return $list_pendaftaran[0];
        }
        return null;
    }

    private function get_form_pendaftaran(Request $req, $view)
    {
        $pembayaran = $this->cek_status_pembayaran($req);
        if ($pembayaran == null) {
            return redirect('/pendaftaran/bayar-tidak-valid');
        }
        $data = $this->get_pendaftaran($pembayaran);
        return view('pendaftaran.' . $view, ['sess' => $req->sess, 'id_bayar' => $pembayaran['id'], 'data' => $data ?? []]);
    }

    public function data_pribadi(Request $req)
    {
        return $this->get_form_pendaftaran($req, 'form_data_pribadi');
    }

    public function data_ayah(Request $req)
    {
        return $this->get_form_pendaftaran($req, 'form_data_ayah');
    }

    public function data_ibu(Request $req)
    {
        return $this->get_form_pendaftaran($req, 'form_data_ibu');
    }

    public function data_wali(Request $req)
    {
        return $this->get_form_pendaftaran($req, 'form_data_wali');
    }

    public function data_periodik(Request $req)
    {
        return $this->get_form_pendaftaran($req, 'form_data_periodik');
    }

    public function data_registrasi(Request $req)
    {
        return $this->get_form_pendaftaran($req, 'form_data_registrasi');
    }

    public function data_keluar(Request $req)
    {
        return $this->get_form_pendaftaran($req, 'form_data_keluar');
    }

    public function data_selesai(Request $req)
    {
        return view('pendaftaran.data_selesai', ['sess' => $req->sess]);
    }

    private function save_data_pendaftaran(Request $req, $fields, $next)
    {
        $pembayaran = $this->cek_status_pembayaran($req);
        if ($pembayaran == null) {
            return redirect('/pendaftaran/bayar-tidak-valid');
        }
        $pendaftaran = $this->get_pendaftaran($pembayaran);
        $sess = $req->sess;
        $data = [
            'id_user' => $sess['id'],
            'id_bayar' => $pembayaran['id'],
        ];
        foreach ($fields as $f) {
            $data[$f] = $req->post($f);
        }

        if ($pendaftaran == null) {
            $ts = Carbon::now();
            $data['created_at'] = $ts;
            $data['updated_at'] = $ts;
            Pendaftaran::insert($data);
        } else {
            $ts = Carbon::now();
            $data['updated_at'] = $ts;
            Pendaftaran::where('id', $pendaftaran['id'])->update($data);
        }
        return redirect('/pendaftaran/' . $next . '?bayar=' . $pembayaran['id']);
    }

    public function save_data_keluar(Request $req)
    {
        $fields = [
            'keluar',
            'Tanggal_Keluar',
            'Alasan_Keluar',  
        ];
        return $this->save_data_pendaftaran($req, $fields, 'data-selesai');
    }

    public function save_data_registrasi(Request $req)
    {
        $fields = [
            'Jenis_Pendaftaran',
            'No_Induk',
            'Tanggal_Masuk',
            'Sekolah_Sebelumnya',
            'Masuk_Rombel',
        ];
        return $this->save_data_pendaftaran($req, $fields, 'data-keluar');
    }

    public function save_data_periodik(Request $req)
    {
        $fields = [
            'Tinggi_Badan',
            'Berat_Badan',
            'Jarak',
            'Jarak_Sebut',
            'Waktu_Tempuh',
            'Jumlah_Saudara',
        ];
        return $this->save_data_pendaftaran($req, $fields, 'data-registrasi');
    }

    public function save_data_wali(Request $req)
    {
        $fields = [
            'Nama_Wali',
            'NIK_Wali',
            'Tanggal_Lahir_Wali',
            'Pendidikan_Wali',
            'Pekerjaan_Wali',
            'Penghasilan_Wali',
            'No_Tlp_Rumah',
            'No_HP',
            'email',
        ];
        return $this->save_data_pendaftaran($req, $fields, 'data-periodik');
    }

    public function save_data_ibu(Request $req)
    {
        $fields = [
            'Nama_Ibu',
            'NIK_Ibu',
            'Tanggal_Lahir_Ibu',
            'Pendidikan_Ibu',
            'Pekerjaan_Ibu',
            'Penghasilan_Ibu',
            'Berkebutuhan_Khusus_Ibu',
        ];
        return $this->save_data_pendaftaran($req, $fields, 'data-wali');
    }

    public function save_data_ayah(Request $req)
    {
        $fields = [
            'Nama_Ayah',
            'NIK_Ayah',
            'Tanggal_Lahir_Ayah',
            'Pendidikan_Ayah',
            'Pekerjaan_Ayah',
            'Penghasilan_Ayah',
            'Berkebutuhan_Khusus_Ayah',
        ];
        return $this->save_data_pendaftaran($req, $fields, 'data-ibu');
    }

    public function save_data_pribadi(Request $req)
    {
        $pembayaran = $this->cek_status_pembayaran($req);
        if ($pembayaran == null) {
            return redirect('/pendaftaran/bayar-tidak-valid');
        }
        $list_pendaftaran = Pendaftaran::where('id_bayar', $pembayaran['id'])->get()->toArray();
        $sess = $req->sess;
        $data = [
            'Nama_Lengkap' => $req->post('Nama_Lengkap'),
            'Jenis_Kelamin' => $req->post('Jenis_Kelamin'),
            'NISN' => $req->post('NISN'),
            'NIK' => $req->post('NIK'),
            'Tempat_Lahir' => $req->post('Tempat_Lahir'),
            'Tanggal_Lahir' => $req->post('Tanggal_Lahir'),
            'No_Regis_Akta' => $req->post('No_Regis_Akta'),
            'Agama' => $req->post('Agama'),
            'Kewarganegaraan' => $req->post('Kewarganegaraan'),
            'Berkebutuhan_Khusus' => $req->post('Berkebutuhan_Khusus'),
            'Alamat_Jalan' => $req->post('Alamat_Jalan'),
            'RT' => $req->post('RT'),
            'RW' => $req->post('RW'),
            'Dusun' => $req->post('Dusun'),
            'Kelurahan' => $req->post('Kelurahan'),
            'Kecamatan' => $req->post('Kecamatan'),
            'Kode_Pos' => $req->post('Kode_Pos'),
            'Tempat_tinggal' => $req->post('Tempat_tinggal'),
            'Mode_Transportasi' => $req->post('Mode_Transportasi'),
            'Nomor_KKS' => $req->post('Nomor_KKS'),
            'Anak_Ke' => $req->post('Anak_Ke'),
            'Penerima_KPS' => $req->post('Penerima_KPS'),
            'No_KPS' => $req->post('No_KPS'),
            'Layak_PIP' => $req->post('Layak_PIP'),
            'Penerima_KIP' => $req->post('Penerima_KIP'),
            'No_KIP' => $req->post('No_KIP'),
            'Nama_KIP' => $req->post('Nama_KIP'),
            'Terima_Kartu_Fisik' => $req->post('Terima_Kartu_Fisik'),
            'Alasan' => $req->post('Alasan'),
            'id_user' => $sess['id'],
            'id_bayar' => $pembayaran['id'],
        ];
        if (count($list_pendaftaran) < 1) {
            $ts = Carbon::now();
            $data['created_at'] = $ts;
            $data['updated_at'] = $ts;
            Pendaftaran::insert($data);
        } else {
            $ts = Carbon::now();
            $data['updated_at'] = $ts;
            $pendaftaran = $list_pendaftaran[0];
            Pendaftaran::where('id', $pendaftaran['id'])->update($data);
        }
        return redirect('/pendaftaran/data-ayah?bayar=' . $pembayaran['id']);
    }

    public function bayar_tidak_valid(Request $req)
    {
        return view('pendaftaran.bayar_tidak_valid', ['sess' => $req->sess]);
    }

    public function bayar_dulu(Request $req)
    {
        return view('pendaftaran.bayar_dulu', ['sess' => $req->sess]);
    }

    public function create(Request $req)
    {
        // return view('pendaftaran.create');
        return view('pendaftaran.create2', [
            'sess' => $req->sess,
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
