@extends('layouts.app2', ['sess' => $sess])

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin " style="height: 500px">
            <div class="card">
                <div class="card-header">
                    <h4>Syarat Pendaftaran</h4>
                </div>
                <div class="card-body">
                    <p>Untuk dapat mengisi formulir pendaftaran, Anda harus melakukan pembayaran terlebih dahulu</p>
                    <br/>

                    <a href="{{ url('/') }}" class="btn btn-primary">Lihat Petunjuk Pendaftaran</a>
                    <a href="{{ url('/pembayaran/baru') }}" class="btn btn-warning">Lakukan Pembayaran</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection