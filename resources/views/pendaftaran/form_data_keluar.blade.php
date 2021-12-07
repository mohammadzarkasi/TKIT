@extends('layouts.app2', ['sess' => $sess, 'title' => 'Isi Data Registrasi Peserta Didik'])

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
                        <a class="nav-link" href="{{ url('/pendaftaran/data-wali?bayar=' . $id_bayar) }}">Data Wali</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/pendaftaran/data-periodik?bayar=' . $id_bayar) }}">Data Periodik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/pendaftaran/data-registrasi?bayar=' . $id_bayar) }}">Registrasi Peserta Didik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/pendaftaran/data-keluar?bayar=' . $id_bayar) }}">Data Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">REGISTRASI PESERTA DIDIK</h4>

                    <form id="form-pendaftaran" action="{{ url('/pendaftaran/data-keluar?bayar=' . $id_bayar) }}" method="POST" class="forms-sample">
                        @csrf

                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Keluar Karena</label>
                            <div class="col-sm-9">
                                <select name="keluar" class="form-control" id="exampleSelectGender">
                                    <option value="Lulus">Lulus</option>
                                    <option value="Mutasi">Mutasi</option>
                                    <option value="Dikeluarkan">Dikeluarkan</option>
                                    <option value="Mengundurkan Diri">Mengundurkan Diri</option>
                                    <option value="Putus Sekolah">Putus Sekolah</option>
                                    <option value="Wafat">Wafat</option>
                                    <option value="Hilang">Hilang</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 col-form-label">Tanggal Keluar</label>
                            <div class="col-sm-9">
                                <input name="Tanggal_Keluar" type="date" class="form-control" id="exampleInputEmail3" #placeholder="Tanggal Masuk">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 col-form-label">Alasan</label>
                            <div class="col-sm-9">
                                <input name="Alasan_Keluar" type="text" class="form-control" id="exampleInputEmail3" #placeholder="Tanggal Masuk">
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