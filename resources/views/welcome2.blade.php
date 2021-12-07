@extends('layouts.app2', ['sess' => $sess])

@section('content')
    
    <div id="home" class="slider">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src={{asset("siswa/img/akun.png")}}>
            </div>
        </div>
    </div>

    @if($sess == null)
        <div class="page-section text-center" id="about">
            <a href="{{ url('/register') }}" class="btn btn-success">Register Sekarang</a>
        </div><!-- .page-section -->
    @endif
@endsection