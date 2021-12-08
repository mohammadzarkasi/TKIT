@extends('admin.app', ['sess' => $sess, 'title' => 'Data Pembayaran'])

@section('js')
<script type="text/javascript" src="{{ asset('js/admin/pembayaran.js') }}"></script>
@endSection()

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Pendaftaran</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Pendaftaran</li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<?php
$status_verifikasi = [
    '1' => 'Menunggu Verifikasi',
    '2' => 'Telah Diverifikasi',
    '3' => 'Ditolak',
];
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h4 class="card-title">
                            Data Pembayaran
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <label for="bank" class="col-lg-2">Bank</label>
                            <div class="col-lg-6">
                                <input type="text" name="bank" id="bank" class="form-control" readonly value="{{ $data['bank'] }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="tanggal" class="col-lg-2">Tanggal</label>
                            <div class="col-lg-6">
                                <input type="text" name="tanggal" id="tanggal" class="form-control" readonly value="{{ \Carbon\Carbon::parse($data['created_at'])->addHours(7)->format('d M Y, H:i') }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="nama" class="col-lg-2">Nama Rekening Pengirim</label>
                            <div class="col-lg-6">
                                <input type="text" name="nama" id="nama" class="form-control" readonly value="{{ $data['nama'] }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="verifikasi" class="col-lg-2">Status Verifikasi</label>
                            <div class="col-lg-6">
                                <input type="text" name="verifikasi" id="verifikasi" class="form-control" readonly value="{{ $status_verifikasi[ $data['verifikasi'] ] }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="nama" class="col-lg-2">Bukti Pembayaran</label>
                            <div class="col-lg-6">
                                <img src="{{ asset($data['lampiran']) }}" class="rounded img-fluid"/>
                                <a class="btn btn-primary mt-2" href="{{ asset($data['lampiran']) }}" target="_blank">Buka Gambar</a>
                            </div>
                        </div>
                        <div class="row mb-2">
                            @if($data['verifikasi'] == '1')
                                <button type="button" class="btn btn-success" onclick="promptVerifikasi({{ $data['id'] }})">Verifikasi</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<form id="mp-form"></form>
@endSection()