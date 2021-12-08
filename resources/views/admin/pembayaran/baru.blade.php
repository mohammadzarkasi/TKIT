@extends('admin.app', ['sess' => $sess, 'title' => 'Pembayaran Baru'])

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Pembayaran Baru</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Pembayaran Baru</li>
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
                        <h4 class="card-title">Data Pembayaran Baru</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hovered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Bank Tujuan</th>
                                    <th>Nama Rekening Pengirim</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 0;
                                ?>
                                @foreach($list_pembayaran as $item)
                                    <?php
                                    $counter++;
                                    ?>
                                    <tr>
                                        <td>{{ $counter }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item['created_at'])->addHours(7)->format('d M Y, H:i') }}</td>
                                        <td>{{ $item['bank'] }}</td>
                                        <td>{{ $item['nama'] }}</td>
                                        <td>
                                            <button type="button" class="btn btn-success">Verifikasi</button>
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