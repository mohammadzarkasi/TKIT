@extends('admin.app', ['sess' => $sess, 'title' => 'Pendaftaran Terverifikasi'])

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Pendaftaran Terverifikasi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Pendaftaran Terverifikasi</li>
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
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Data Pendaftaran Baru</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hovered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Ayah</th>
                                    <th>Ibu</th>
                                    <th>Wali</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 0;
                                ?>
                                @foreach($list_pendaftaran as $item)
                                <?php
                                $counter++;
                                ?>
                                <tr>
                                    <td>{{ $counter }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item['created_at'])->addHours(7)->format('d M Y, H:i') }}</td>
                                    <td>{{ $item['Nama_Lengkap'] }}</td>
                                    <td>{{ $item['Jenis_Kelamin'] }}</td>
                                    <td>{{ $item['Nama_Ayah'] }}</td>
                                    <td>{{ $item['Nama_Ibu'] }}</td>
                                    <td>{{ $item['Nama_Wali'] }}</td>
                                    <td>
                                        <a href="{{ url('/admin/pembayaran/lihat?id=' . $item['id']) }}" class="btn btn-warning">Lihat Data</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endSection()