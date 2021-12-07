@extends('layouts.app2', ['sess' => $sess, 'title' => 'Isi Data Registrasi Peserta Didik'])

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin" style="height: 500px">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">PENGISIAN DATA SELESAI</h4>
                </div>
                <div class="card-body">
                    <p>Pengisian data pendaftaran siswa baru selesai. Data yang Anda masukkan akan diverifikasi oleh Admin.</p>
                   
                    <a href="{{ url('/pendaftaran') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endSection()