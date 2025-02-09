@extends('admin.app', ['sess' => $sess, 'title' => 'Data tidak ditemukan'])

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Pendaftaran Baru</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Pendaftaran Baru</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger">
                    <p>Data yang ada cari tidak ditemukan</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endSection()