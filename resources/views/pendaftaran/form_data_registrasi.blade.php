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
                        <a class="nav-link active" href="{{ url('/pendaftaran/data-registrasi?bayar=' . $id_bayar) }}">Registrasi Peserta Didik</a>
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
                    <h4 class="card-title">REGISTRASI PESERTA DIDIK</h4>
                    <p class="card-description">
                        Isi berdasarkan data Siswa
                    </p>


                    <form id="form-pendaftaran" action="{{ url('/pendaftaran/data-registrasi?bayar=' . $id_bayar) }}" method="POST" class="forms-sample">
                        @csrf

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenis Pendaftaran</label>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <label class="form-check-label" class="col-sm-2 col-form-label">
                                        <input type="radio" class="form-check-input" name="Jenis_Pendaftaran" id="membershipRadios1" value="Siswa_Baru" checked>
                                        Siswa Baru
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <label class="form-check-label" class="col-sm-2 col-form-label">
                                        <input type="radio" class="form-check-input" name="Jenis_Pendaftaran" id="membershipRadios2" value="Pindahan">
                                        Siswa Pindahan
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <label class="form-check-label" class="col-sm-2 col-form-label">
                                        <input type="radio" class="form-check-input" name="Jenis_Pendaftaran" id="membershipRadios2" value="Sekolah_Lagi">
                                        Sekolah Lagi
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 col-form-label">No. Induk Siswa</label>
                            <div class="col-sm-9">
                                <input input name="No_Induk" type="text" class="form-control" id="exampleInputEmail3" #placeholder="No Induk Siswa">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 col-form-label">Tanggal Masuk</label>
                            <div class="col-sm-9">
                                <input input name="Tanggal_Masuk" type="date" class="form-control" id="exampleInputEmail3" #placeholder="Tanggal Masuk">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 col-form-label">Sekolah Sebelumnya</label>
                            <div class="col-sm-9">
                                <input input name="Sekolah_Sebelumnya" type="text" class="form-control" id="exampleInputEmail3" #placeholder="Tanggal Masuk">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Masuk Rombel</label>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="Masuk_Rombel" id="membershipRadios1" value="A" checked>
                                        A (4-5 Tahun)
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="Masuk_Rombel" id="membershipRadios2" value="B">
                                        B (5-6 Tahun)
                                    </label>
                                </div>
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