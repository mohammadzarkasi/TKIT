@extends('layouts.app2', ['sess' => $sess, 'title' => 'Pembayaran Berhasil'])

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin " style="height: 500px">
            <div class="card">
                <div class="card-header">
                    <h4>Pembayaran Berhasil</h4>
                </div>
                <div class="card-body">
                    <p>Pembayaran berhasil disimpan. Mohon tunggu konfirmasi dari Admin untuk dapat melanjutkan pendaftaran.</p>
                    <a href="{{ url('/pembayaran') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection