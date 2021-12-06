@extends('auths.template', ['title' => 'Regiter'])

@section('content')
<div class="auth-form-light text-left py-5 px-4 px-sm-5">
    <h3>Registrasi Berhasil</h3>
    <p>Anda telah berhasil melakukan registrasi ke dalam Sistem Informasi Pendaftaran Siswa Baru TKIT Buah Hati Kita Jember. Silakan login untuk melanjutkan.</p>
    <a href="{{ url('/login') }}" class="btn btn-primary">Halaman Login</a>
</div>
@endSection()