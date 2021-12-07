@extends('layouts.app2', ['sess'=>$sess, 'title' => 'Pembayaran'])

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Laman Pembayaran</h4>
                    <p class="card-description">
                        Upload Bukti Pembayaran
                    </p>
                    <form action="{{ url('pembayaran') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <label for="exampleSelectGender">Bank yang dituju</label>
                            <select name="bank" class="form-control" id="exampleSelectGender">
                                <option value="bni">BNI</option>
                                <option value="bri">BRI</option>
                                <option value="mandiri">Mandiri</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Atas Nama</label>
                            <input name="nama" type="text" class="form-control" id="exampleInputName1"
                                placeholder="Atas Nama">
                        </div>
                        <div class="form-group">
                            <label class="text-black" for="file">Bukti Pembayaran</label>
                            <input name="lampiran" type="file" id="subject" class="form-control">
                        </div>

                        @if(\Session::has('errmsg'))
                            <div class="text-left font-weight-light text-danger mb-4">
                                {{ \Session::get('errmsg') }}
                            </div>
                        @endif

                            
                        <div class="row form-group mt-4">
                            <div class="col-md-12">
                                <button type="submit" value="Send Message" class="btn btn-primary">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection