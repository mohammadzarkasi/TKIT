@extends('auths.template', ['title' => 'Gagal Aktivasi Akun'])

@section('content')
  <div class="auth-form-light text-left py-5 px-4 px-sm-5">
    <h3>REGISTRASI PENGGUNA</h3>

    {{-- <h4>DAFTAR AKUN ORANG TUA/WALI</h4> --}}
    <h5 class="font-weight-light">Kami tidak dapat melakukan aktivasi untuk akun Anda. Pastikan Anda mengikuti petunjuk
      yang telah kami kirimkan ke email Anda.</h5>

    <div class="text-center font-weight-light">
      Kembali ke <a href="{{ url('/') }}" class="text-primary">Beranda</a>
    </div>
    </form>
  </div>
@endSection()
