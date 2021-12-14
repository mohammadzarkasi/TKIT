@extends('layouts.app2', ['sess' => $sess,'title' => 'Riwayat Pendaftaran'])

@section('js')
    <script type="text/javascript" src="{{ asset('js/pendaftaran.js') }}"></script>
@endsection

@section('content')
<form id="mp-form"></form>
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin " style="height: 500px">
            @if(\Session::has('errmsg'))
                <div class="alert alert-danger" role="alert">
                    {{ \Session::get('errmsg') }}
                </div>
            @endif
            
            @if(\Session::has('msg'))
                <div class="alert alert-success" role="alert">
                    {{ \Session::get('msg') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Riwayat Pendaftaran Saya</h4>
                </div>
                <div class="card-body">
                    <a href="{{ url('/pendaftaran/baru') }}" class="btn btn-primary mb-3">Buat Pendaftaran Baru</a>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Calon Siswa</th>
                                <!-- <th>Nama Rekening</th> -->
                                <th>Status Verifikasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 0
                            @endphp
                            @foreach ($list_pendaftaran as $row)
                            @php
                                $counter++;
                                $status_verifikasi = 'Menunggu Verifikasi';
                                switch ($row['verifikasi']) {
                                    case '2':
                                        $status_verifikasi = 'Telah Diverifikasi';
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
                                    <td>{{ \Carbon\Carbon::parse($row['created_at'])->addHours(7)->format('d M Y, H:i') }}</td>
                                    <td>{{ $row['Nama_Lengkap'] }}</td>
                                    <td>{{ $status_verifikasi }}</td>
                                    <td>
                                        
                                        <a class="btn btn-success" href="{{ url('/pendaftaran/data-pribadi?bayar=' . $row['id_bayar']) }}">Lihat</a>
                                        
                                        @if ($row['verifikasi'] == '1')
                                            <button class="btn btn-danger" onclick="promptHapus({{ $row['id'] }})">Hapus</button>
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