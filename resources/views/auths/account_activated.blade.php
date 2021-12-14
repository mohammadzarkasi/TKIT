@extends('auths.template', ['title' => 'Aktivasi Akun Berhasil'])

@section('content')
  <div class="auth-form-light text-left py-5 px-4 px-sm-5">
    <h3>REGISTRASI PENGGUNA</h3>

    {{-- <h4>DAFTAR AKUN ORANG TUA/WALI</h4> --}}
    <h5 class="font-weight-light"> Akun Anda berhasil diaktifkan.</h5>

    <div class="text-center mt-4 font-weight-light">
      <a href="{{ url('/login') }}" class="text-primary">Login</a> sekarang
    </div>
    <div class="text-center font-weight-light">
      Atau kembali ke <a href="{{ url('/') }}" class="text-primary">Beranda</a>
    </div>
    </form>
  </div>
@endSection()
