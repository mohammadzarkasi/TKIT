@extends('auths.template', ['title' => 'Regiter'])

@section('content')
        {{-- @include('auths.register') --}}

        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <div class="brand-logo1 text-center mb-5">
              {{-- <img src={{asset("siswa/img/logo1.png")}} alt="logo"> --}}
              <h3>REGISTRASI PENGGUNA</h3>
            </div>
            <h4>DAFTAR AKUN ORANG TUA/WALI</h4>
            <h6 class="font-weight-light"> Mohon isi data dengan benar.</h6>
            <form action="{{ url('/register') }}" method="POST" class="pt-3">
              @csrf
              <!-- <div class="form-group">
                <input name="name" type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Nama">
              </div> -->
              <div class="form-group">
                <label>Nama Orang Tua / Wali</label>
                <input name="nama" type="text" class="form-control form-control-lg" id="nama" placeholder="Nama Orang Tua / Wai" />
              </div>
              <div class="form-group">
                <label>Alamat Lengkap</label>
                {{-- <input name="alamat" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password"> --}}
                <textarea class="form-control form-control-lg" id="alamat" name="alamat" placeholder="Alamat Lengkap" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label>Nomor HP</label>
                <input name="nomor_hp" type="text" class="form-control form-control-lg" id="nomor_hp" placeholder="Nomor HP" />
              </div>
              
              <div class="form-group">
                <label>Pekerjaan</label>
                <input name="pekerjaan" type="text" class="form-control form-control-lg" id="pekerjaan" placeholder="Pekerjaan" />
              </div>

              <div class="form-group">
                <label>Email</label>
                <input name="email" type="email" class="form-control form-control-lg" id="email" placeholder="Email" />
              </div>

              <div class="form-group">
                <label>Password</label>
                <input name="password" type="password" class="form-control form-control-lg" id="password" placeholder="Password" />
              </div>

              <div class="my-3">
                <button type="submit" value="Login" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Daftar</button>
              </div>

              <div class="text-center mt-4 font-weight-light">
                Sudah punya akun? <a href="{{ url('/login') }}" class="text-primary">Silahkan login di sini</a>
              </div>
              <div class="text-center font-weight-light">
                Atau kembali ke <a href="{{ url('/') }}" class="text-primary">Beranda</a>
              </div>
            </form>
          </div>

@endSection()