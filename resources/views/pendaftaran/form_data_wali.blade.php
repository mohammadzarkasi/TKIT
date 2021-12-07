@extends('layouts.app2', ['sess' => $sess, 'title' => 'Isi Data Pribadi'])

@section('js')
<script type='text/javascript' src="{{ asset('js/pendaftaran.js') }}"></script>
<script>
    var __data = <?php echo json_encode($data); ?>;
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
                        <a class="nav-link" aria-current="page" href="{{ url('/pendaftaran/data-pribadi?bayar=' . $id_bayar) }}">Data Pribadi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/pendaftaran/data-ayah?bayar=' . $id_bayar) }}">Data Ayah Kandung</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/pendaftaran/data-ibu?bayar=' . $id_bayar) }}">Data Ibu Kandung</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/pendaftaran/data-wali?bayar=' . $id_bayar) }}">Data Wali</a>
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
                    <h4 class="card-title">DATA AYAH KANDUNG</h4>
                    <form id="form-pendaftaran" action="{{ url('/pendaftaran/data-wali?bayar=' . $id_bayar) }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Wali</label>
                            <div class="col-sm-9">
                                <input input name="Nama_Wali" type="text" class="form-control" id="exampleInputUsername2" #placeholder="Nama Ibu">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">NIK</label>
                            <div class="col-sm-9">
                                <input input name="NIK_Wali" type="text" class="form-control" id="exampleInputUsername2" #placeholder="NIK">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tanggal
                                Lahir</label>
                            <div class="col-sm-9">
                                <input input name="Tanggal_Lahir_Wali" type="date" class="form-control" id="exampleInputUsername2" #placeholder="Tanggal Lahir">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="exampleInputUsername2">Pendidikan</label>
                            <div class="col-sm-9">
                                <select name="Pendidikan_Wali" class="form-control" id="exampleSelectGender">
                                    <option value="Tidak sekolah">Tidak Sekolah</option>
                                    <option value="Putus SD">Putus SD</option>
                                    <option value="SD">SD Sederajat</option>
                                    <option value="SMP">SMP Sederajat</option>
                                    <option value="SMA">SMA</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4/s1">D4/S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="exampleInputUsername2">Pekerjaan</label>
                            <div class="col-sm-9">
                                <select name="Pekerjaan_Wali" class="form-control" id="exampleSelectGender">
                                    <option value="tidak bekerja">Tidak Bekerja</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Petani">Petani</option>
                                    <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                    <option value="Pedagang Kecil">Pedagang Kecil</option>
                                    <option value="Pedagang besar">Pedagang Besar</option>
                                    <option value="wiraswasta">Wiraswasta</option>
                                    <option value="wirausaha">Wirausaha</option>
                                    <option value="buruh">Buruh</option>
                                    <option value="pensiunan">Pensiunan</option>
                                    <option value="meninggal dunia">Meninggal Dunia</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="exampleInputUsername2">Penghasilan
                                Bulanan</label>
                            <div class="col-sm-9">
                                <select name="Penghasilan_Wali" class="form-control" id="exampleSelectGender">
                                    <option value="kurang_500.000">Kurang dari Rp.500.000</option>
                                    <option value="500.000-999.999">Rp.500.000 - Rp.999.999</option>
                                    <option value="1juta-1.999.999">1 juta - Rp.1.999.999</option>
                                    <option value="2juta-4.999.999">2 juta - Rp.4.999.999</option>
                                    <option value="5juta-20juta">5 juta - 20 juta</option>
                                    <option value="lebih_20juta">Lebih dari 20 juta</option>
                                    <option value="tidak_berpenghasilan">Tidak Berpenghasilan</option>
                                </select>
                            </div>
                        </div>
                        <h4 class="card-title">KONTAK</h4>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nomor telepon
                                Rumah</label>
                            <div class="col-sm-9">
                                <input input name="No_Tlp_Rumah" type="text" class="form-control" id="exampleInputUsername2" #placeholder="Nama Ibu">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nomor HP</label>
                            <div class="col-sm-9">
                                <input input name="No_HP" type="text" class="form-control" id="exampleInputUsername2" #placeholder="NIK">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input input name="email" type="text" class="form-control" id="exampleInputUsername2" #placeholder="NIK">
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