@extends('layouts.app2', ['sess' => $sess,'title' => 'Riwayat Pembayaran'])

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin " style="height: 500px">
            <div class="card">
                <div class="card-header">
                    <h4>Riwayat Pembayaran</h4>
                </div>
                <div class="card-body">
                    <a href="{{ url('/pembayaran/baru') }}" class="btn btn-primary mb-3">Buat Pembayaran Baru</a>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Bank Tujuan</th>
                                <th>Nama Rekening</th>
                                <th>Status Verifikasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 0
                            @endphp
                            @foreach ($rows as $row)
                            @php
                                $counter++;
                                $status_verifikasi = 'Menunggu Verifikasi';
                                switch ($row['verifikasi']) {
                                    case '2':
                                        $status_verisikasi = 'Telah Diverifikasi';
                                        break;
                                    case '3':
                                        $status_verifikasi = 'Pembayaran Tidak Valid';
                                        break;
                                    
                                    default:
                                        break;
                                }
                            @endphp
                                <tr>
                                    <td>{{ $counter }}</td>
                                    <td>{{ \Carbon\Carbon::parse($row['created_at'])->locale('id_ID')->format('d M Y, H:i') }}</td>
                                    <td>{{ $row['bank'] }}</td>
                                    <td>{{ $row['nama'] }}</td>
                                    <td>{{ $status_verifikasi }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ url('/pembayaran/lihat?id=' . $row['id']) }}">Lihat</a>
                                        @if ($row['verifikasi'] == '2')
                                            <a class="btn btn-info" href="{{ url('/pendaftaran/formulir?bayar=' . $row['id']) }}">Formulir Pendaftaran</a>
                                        @endif
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
@endsection