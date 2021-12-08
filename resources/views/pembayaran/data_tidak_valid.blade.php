@extends('layouts.app2', ['sess' => $sess, 'title' => 'Data Tidak Valid'])

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin " style="height: 500px">
            <div class="card">
                <div class="card-header">
                    <h4>Data Pembayaran Tidak Valid</h4>
                </div>
                <div class="card-body">
                    <p>Data pembayaran yang Anda pilih tidak valid.</p>
                    <br/>

                    <a href="{{ url('/pembayaran') }}" class="btn btn-warning">Lihat Data Pembayaran</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection