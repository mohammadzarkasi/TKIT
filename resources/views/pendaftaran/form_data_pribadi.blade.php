@extends('layouts.app2', ['sess' => $sess, 'title' => 'Isi Data Pribadi'])

@section('js')
<script type='text/javascript' src="{{ asset('js/pendaftaran.js') }}"></script>
<script>
    var __data = {!! json_encode($data) !!};
    fill_form_pendaftaran(__data);
</script>

@endSection()

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="bg-white pb-3 pt-2">
                <ul class="nav justify-content-center nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/pendaftaran/data-pribadi?bayar=' . $id_bayar) }}">Data Pribadi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/pendaftaran/data-ayah?bayar=' . $id_bayar) }}">Data Ayah Kandung</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/pendaftaran/data-ibu?bayar=' . $id_bayar) }}">Data Ibu Kandung</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/pendaftaran/data-wali?bayar=' . $id_bayar) }}">Data Wali</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/pendaftaran/data-periodik?bayar=' . $id_bayar) }}">Data Periodik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/pendaftaran/data-registrasi?bayar=' . $id_bayar) }}">Registrasi Peserta Didik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/pendaftaran/data-keluar?bayar=' . $id_bayar) }}">Data Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">DATA PRIBADI</h4>
                    <form id="form-pendaftaran" action="{{ url('/pendaftaran/data-pribadi?bayar=' . $id_bayar) }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama
                                Lengkap</label>
                            <div class="col-sm-9">
                                <input name="Nama_Lengkap" type="text" class="form-control" id="Nama_Lengkap" #placeholder="Nama Lengkap">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="Jenis_Kelamin" id="Jenis_Kelamin" value="Laki-laki" checked>
                                        Laki-laki
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="Jenis_Kelamin" id="membershipRadios2" value="perempuan">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">NISN</label>
                            <div class="col-sm-9">
                                <input name="NISN" type="text" class="form-control" id="NISN" #placeholder="NISN">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">NIK/No. KITAS (Untuk
                                WNA)</label>
                            <div class="col-sm-9">
                                <input name="NIK" type="text" class="form-control" id="NIK" #placeholder="NIK/No. KITAS">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername1" class="col-sm-3 col-form-label">Tempat
                                Lahir</label>
                            <div class="col-sm-9">
                                <input name="Tempat_Lahir" type="text" class="form-control" id="Tempat_Lahir" #placeholder="Tempat Lahir">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername1" class="col-sm-3 col-form-label">Tanggal
                                Lahir</label>
                            <div class="col-sm-9">
                                <input name="Tanggal_Lahir" type="date" class="form-control" id="Tanggal_Lahir" #placeholder="Tanggal Lahir">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">No. Registrasi Akta
                                Lahir</label>
                            <div class="col-sm-9">
                                <input name="No_Regis_Akta" type="text" class="form-control" id="No_Regis_Akta" #placeholder="No. Registrasi Akta Lahir">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="exampleInputUsername2">Agama</label>
                            <div class="col-sm-9">
                                <select name="Agama" class="form-control" id="Agama">
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen/Protestan">Kristen/Protestan</option>
                                    <option value="Hindu">Khatolik</option>
                                    <option value="Budha">Hindu</option>
                                    <option value="Khong_Hu_Chu">Khong Hu Chu</option>
                                    <option value="YME">Kepercayaan kpd YME</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kewarganegaraan</label>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="Kewarganegaraan" id="membershipRadios1" value="WNI" checked>
                                        Indonesia (WNI)
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="Kewarganegaraan" id="membershipRadios2" value="WNA">
                                        Asing (WNA)
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="exampleInputUsername2">Berkebutuhan
                                Khusus</label>
                            <div class="col-sm-9">
                                <select name="Berkebutuhan_Khusus" class="form-control" id="Berkebutuhan_Khusus">
                                    <option value="Tidak">Tidak</option>
                                    <option value="Netra">Netra</option>
                                    <option value="Rungu">Rungu</option>
                                    <option value="Grahita_ringan">Grahita Ringan</option>
                                    <option value="Grahita_Sedang">Grahita Sedang</option>
                                    <option value="Daksa_Ringan">Daksa Ringan</option>
                                    <option value="Daksa_Sedang">Daksa Sedang</option>
                                    <option value="Laras">Larasa</option>
                                    <option value="Wicara">Wicara</option>
                                    <option value="Tuna_ganda">Tuna Ganda</option>
                                    <option value="Hiper_aktif">Hiper Aktif</option>
                                    <option value="Cerdas_Isimewa">Cerdas Isimewa</option>
                                    <option value="Bakat_Istimewa">Bakat Istimewa</option>
                                    <option value="Kesulitan_Belajra">Kesulitan Belajar</option>
                                    <option value="Narkoba">Narkoba</option>
                                    <option value="Indigo">Indigo</option>
                                    <option value="Down_Sindrome">Down Sindrome</option>
                                    <option value="Autis">Autis</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Alamat_Jalan" class="col-sm-3 col-form-label">Alamat
                                Lengkap</label>
                            <div class="col-sm-9">
                                <input name="Alamat_Jalan" type="text" class="form-control" id="Alamat_Jalan" #placeholder="Alamat Lengkap">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="RT" class="col-sm-3 col-form-label">RT</label>
                            <div class="col-sm-9">
                                <input name="RT" type="text" class="form-control" id="RT" #placeholder="RT">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="RW" class="col-sm-3 col-form-label">RW</label>
                            <div class="col-sm-9">
                                <input name="RW" type="text" class="form-control" id="RW" #placeholder="RW">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Dusun" class="col-sm-3 col-form-label">Nama Dusun</label>
                            <div class="col-sm-9">
                                <input name="Dusun" type="text" class="form-control" id="Dusun" #placeholder="Nama Dusun">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Kelurahan" class="col-sm-3 col-form-label">Nama Kelurahan/
                                Desa</label>
                            <div class="col-sm-9">
                                <input name="Kelurahan" type="text" class="form-control" id="Kelurahan" #placeholder="Nama Kelurahan/ Desa">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                            <div class="col-sm-9">
                                <input name="Kecamatan" type="text" class="form-control" id="Kecamatan" #placeholder="Kecamatan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Kode_Pos" class="col-sm-3 col-form-label">Kode Pos</label>
                            <div class="col-sm-9">
                                <input name="Kode_Pos" type="text" class="form-control" id="Kode_Pos" #placeholder="Kode Pos">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="Tempat_tinggal">Tempat
                                Tinggal</label>
                            <div class="col-sm-9">
                                <select name="Tempat_tinggal" class="form-control" id="Tempat_tinggal">
                                    <option value="Orang_Tua">Bersama Orang Tua</option>
                                    <option value="Wali">Wali</option>
                                    <option value="Kos">Kos</option>
                                    <option value="Asrama">Asrama</option>
                                    <option value="Panti Asuhan">Panti Asuhan</option>
                                    <option value="Pesantren">Pesantren</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="Mode_Transportasi">Mode
                                Transportasi</label>
                            <div class="col-sm-9">
                                <select name="Mode_Transportasi" class="form-control" id="Mode_Transportasi">
                                    <option value="Jalan_Kaki">Jalan Kaki</option>
                                    <option value="Kendaraan_pribadi">Kendaraan Pribadi</option>
                                    <option value="Kendaraan_Umum">Kendaraan Umum/Angkot/Pete-pete</option>
                                    <option value="Jemputan">Jemputan Sekolah</option>
                                    <option value="Beca">Andong/Bendi/Sado/Dokar/Ddelman/Beca</option>
                                    <option value="Perahu">Perahu Penyebrangan/Rakit/Getek</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Nomor_KKS" class="col-sm-3 col-form-label">Nomor KKS (Kartu
                                Keluarga Sejahtera)</label>
                            <div class="col-sm-9">
                                <input name="Nomor_KKS" type="text" class="form-control" id="Nomor_KKS" #placeholder="Anak Ke">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Anak_Ke" class="col-sm-3 col-form-label">Anak
                                Keberapa</label>
                            <div class="col-sm-9">
                                <input name="Anak_Ke" type="text" class="form-control" id="Anak_Ke" #placeholder="Anak Ke">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Penerima KPS/PKH</label>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="Penerima_KPS" id="membershipRadios1" value="ya" checked>
                                        Ya
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="Penerima_KPS" id="membershipRadios2" value="tidak">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="No_KPS" class="col-sm-3 col-form-label">No. KPS/PKH</label>
                            <div class="col-sm-9">
                                <input name="No_KPS" type="text" class="form-control" id="No_KPS" #placeholder="No. KPS/ PKH">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Usulan Dari Sekolah (Layak PIP)</label>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="Layak_PIP" id="membershipRadios1" value="ya" checked>
                                        Ya
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="Layak_PIP" id="membershipRadios2" value="tidak">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Penerima KIP (Kartu Indonesia Pintar)</label>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="Penerima_KIP" id="membershipRadios1" value="ya" checked>
                                        Ya
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="Penerima_KIP" id="membershipRadios2" value="tidak">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="No_KIP" class="col-sm-3 col-form-label">Nomor KIP</label>
                            <div class="col-sm-9">
                                <input name="No_KIP" type="text" class="form-control" id="No_KIP" #placeholder="Nomor KIP">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Nama_KIP" class="col-sm-3 col-form-label">Nama tertera di
                                KIP</label>
                            <div class="col-sm-9">
                                <input name="Nama_KIP" type="text" class="form-control" id="Nama_KIP">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Terima fisik Kartu (KIP)</label>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="Terima_Kartu_Fisik" id="membershipRadios1" value="ya" checked>
                                        Ya
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="Terima_Kartu_Fisik" id="membershipRadios2" value="tidak">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="Alasan">Alasan layak
                                PIK</label>
                            <div class="col-sm-9">
                                <select name="Alasan" class="form-control" id="Alasan">
                                    <option value="Pemegang PKH/KPS/KIP">Pemegang PKH/KPS/KIP</option>
                                    <option value="Penerima_BSM">Penerima BSM</option>
                                    <option value="Yatim_Piatu">Yatim Piatu/Panti Asuhan/Panti Sosial</option>
                                    <option value="Dampak_Bencana">Dampak Bencana</option>
                                    <option value="Prenah_DO">Pernah Drop Out</option>
                                    <option value="Siswa_Miskin">Siswa Miskin/Renta Miskin</option>
                                    <option value="Daerah_Konflik">Daerah Konflik</option>
                                    <option value="Keluarga_Terpidana">Keluarga Terpidana</option>
                                    <option value="Kelainan_Fisik">Kelainan Fisik</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group mt-4">
                            <div class="col-md-12">
                                <button type="submit" value="Send Message" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endSection()