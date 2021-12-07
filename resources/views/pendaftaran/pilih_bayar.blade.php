@extends('layouts.app2', ['sess' => $sess, 'title' => 'Pilih Pembayaran'])

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin " style="height: 500px">
            <div class="card">
                <div class="card-header">
                    <h4>Pilih Data Pembayaran</h4>
                </div>
                <div class="card-body">
                    <p>Pilih data pembayaran untuk kemudian digunakan sebagai syarat pendaftaran.</p>
                    <p>Pembayaran yang dapat digunakan sebagai syarat pendaftaran adalah yang telah diverifikasi oleh Admin.</p>
                    <table class="table table-hovered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Bank Tujuan</th>
                                <th>Nama Rekening Pengirim</th>
                                <th>Status Verifikasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 0;
                            @endphp
                            @foreach($list_pembayaran as $item)
                                @php
                                    $counter++;
                                    $status_verifikasi = 'Menunggu Verifikasi';
                                    switch ($item['verifikasi']) {
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
                                    <td>{{ \Carbon\Carbon::parse($item['created_at'])->addHours(7)->format('d M Y, H:i') }}</td>
                                    <td>{{ $item['bank'] }}</td>
                                    <td>{{ $item['nama'] }}</td>
                                    <td>{{ $status_verifikasi }}</td>
                                    <td>
                                        @if($item['verifikasi'] == '2')
                                            <a class="btn btn-info" href="{{ url('/pendaftaran/data-pribadi?bayar=' . $item['id']) }}">Formulir Pendaftaran</a>
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
@endSection()