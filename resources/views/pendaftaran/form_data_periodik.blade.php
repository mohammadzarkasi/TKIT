@extends('layouts.app2', ['sess' => $sess, 'title' => 'Isi Data Periodik'])

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
                        <a class="nav-link active" href="{{ url('/pendaftaran/data-periodik?bayar=' . $id_bayar) }}">Data Periodik</a>
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
                    <h4 class="card-title">DATA PERIODIK</h4>
                    <form id="form-pendaftaran" action="{{ url('/pendaftaran/data-periodik?bayar=' . $id_bayar) }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputName1" class="col-sm-3 col-form-label">Tinggi Badan</label>
                            <div class="col-sm-9">
                                <input input name="Tinggi_Badan" type="text" class="form-control" id="exampleInputName1" #placeholder="Tinggi Badan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 col-form-label">Berat Badan</label>
                            <div class="col-sm-9">
                                <input input name="Berat_Badan" type="text" class="form-control" id="exampleInputEmail3" #placeholder="Berat Badan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" class="col-sm-3 col-form-label">Jarak tempat
                                tinggal ke sekolah</label>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <label class="form-check-label" class="col-sm-3 col-form-label">
                                        <input type="radio" class="form-check-input" name="Jarak" id="membershipRadios1" value="Kurang_1KM" checked>
                                        Kurang dari 1 km
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <label class="form-check-label" class="col-sm-3 col-form-label">
                                        <input type="radio" class="form-check-input" name="Jarak" id="membershipRadios2" value="Lebih_1KM">
                                        Lebih dari 1 km
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 col-form-label">Sebutkan dalam
                                kilometer</label>
                            <div class="col-sm-9">
                                <input input name="Jarak_Sebut" type="text" class="form-control" id="exampleInputEmail3" #placeholder="Jumlah Saudara">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 col-form-label">Waktu tempuh ke
                                sekolah</label>
                            <div class="col-sm-9">
                                <input input name="Waktu_Tempuh" type="text" class="form-control" id="exampleInputEmail3" #placeholder="Jumlah Saudara">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 col-form-label">Jumlah Saudara
                                Kandung</label>
                            <div class="col-sm-9">
                                <input input name="Jumlah_Saudara" type="text" class="form-control" id="exampleInputEmail3" #placeholder="Jumlah Saudara">
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