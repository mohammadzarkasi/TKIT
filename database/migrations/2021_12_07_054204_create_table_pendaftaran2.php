<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePendaftaran2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran2', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('id_bayar')->nullable();
            $table->integer('id_user')->nullable();
            $table->string('Nama_Lengkap')->nullable();
            $table->enum('Jenis_Kelamin', ['Laki-laki', 'perempuan'])->nullable();
            $table->string('NISN')->nullable();
            $table->string('NIK')->nullable();
            $table->string('Tempat_Lahir')->nullable();
            $table->date('Tanggal_Lahir')->nullable();
            $table->string('No_Regis_Akta')->nullable();
            $table->enum('Agama', ['Islam', 'Kristen/Protestan', 'Hindu', 'Budha', 'Khong_Hu_Chu', 'YME', 'Lainnya'])->nullable();
            $table->enum('Kewarganegaraan', ['WNI', 'WNA'])->nullable();
            $table->enum('Berkebutuhan_Khusus', [
                'Tidak', 'Netra', 'Rungu', 'Grahita_ringan', 'Grahita_Sedang', 'Daksa_Ringan', 'Daksa_Sedang', 'Laras', 'Wicara',
                'Tuna_ganda', 'Hiper_aktif', 'Cerdas_Istimewa', 'Bakat_Istimewa', 'Kesulitan_Belajra', 'Narkoba', 'Indigo', 'Down_Sindrome', 'Autis'
            ])->nullable();
            $table->string('Alamat_Jalan')->nullable();
            $table->string('RT')->nullable();
            $table->string('RW')->nullable();
            $table->string('Dusun')->nullable();
            $table->string('Kelurahan')->nullable();
            $table->string('Kecamatan')->nullable();
            $table->string('Kode_Pos')->nullable();
            $table->enum('Tempat_tinggal', ['Orang_Tua', 'Wali', 'Kos', 'Asrama', 'Panti Asuhan', 'Pesantren', 'Lainnya'])->nullable();
            $table->enum('Mode_Transportasi', ['Jalan_Kaki', 'Kendaraan_pribadi', 'Kendaraan_Umum', 'Jemputan', 'Beca', 'Perahu', 'Lainnya'])->nullable();
            $table->string('Nomor_KKS')->nullable();
            $table->string('Anak_Ke')->nullable();
            $table->enum('Penerima_KPS', ['ya', 'tidak'])->nullable();
            $table->string('No_KPS')->nullable();
            $table->enum('Layak_PIP', ['ya', 'tidak'])->nullable();
            $table->enum('Penerima_KIP', ['ya', 'tidak'])->nullable();
            $table->string('No_KIP')->nullable();
            $table->string('Nama_KIP')->nullable();
            $table->enum('Terima_Kartu_Fisik', ['ya', 'tidak'])->nullable();
            $table->enum('Alasan', [
                'Pemegang PKH/KPS/KIP', 'Penerima_BSM', 'Yatim_Piatu', 'Dampak_Bencana',
                'Prenah_DO', 'Siswa_Miskin', 'Daerah_Konflik', 'Keluarga_Terpidna', 'Kelainan_Fisik'
            ])->nullable();
            $table->string('Nama_Ayah')->nullable();
            $table->string('NIK_Ayah')->nullable();
            $table->date('Tanggal_Lahir_Ayah')->nullable();
            $table->enum('Pendidikan_Ayah', ['Tidak sekolah', 'Putus SD', 'SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'D4/S1', 'S2', 'S3'])->nullable();
            $table->enum('Pekerjaan_Ayah', [
                'tidak bekerja', 'Nelayan', 'Petani', 'PNS/TNI/POLRI', 'Karyawan Swasta',
                'Pedagang Kecil', 'Pedagang besar', 'wiraswasta', 'wirausaha', 'buruh, pensiunan', 'meninggal dunia', 'lainnya'
            ])->nullable();
            $table->enum('Penghasilan_Ayah', [
                'kurang_500.000', '500.000-999.999', '1juta-1.999.999',
                '2juta-4.999.999', '5juta-20juta', 'lebih_20juta', 'tidak_berpenghasilan'
            ])->nullable();
            $table->enum('Berkebutuhan_Khusus_Ayah', [
                'Tidak', 'Netra', 'Rungu', 'Grahita_ringan', 'Grahita_Sedang', 'Daksa_Ringan', 'Daksa_Sedang', 'Laras', 'Wicara',
                'Tuna_ganda', 'Hiper_aktif', 'Cerdas_Istimewa', 'Bakat_Istimewa', 'Kesulitan_Belajra', 'Narkoba', 'Indigo', 'Down_Sindrome', 'Autis'
            ])->nullable();
            $table->string('Nama_Ibu')->nullable();
            $table->string('NIK_Ibu')->nullable();
            $table->date('Tanggal_Lahir_Ibu')->nullable();
            $table->enum('Pendidikan_Ibu', ['Tidak sekolah', 'Putus SD', 'SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'D4/S1', 'S2', 'S3'])->nullable();
            $table->enum('Pekerjaan_Ibu', [
                'tidak bekerja', 'Nelayan', 'Petani', 'PNS/TNI/POLRI', 'Karyawan Swasta',
                'Pedagang Kecil', 'Pedagang besar', 'wiraswasta', 'wirausaha', 'buruh, pensiunan', 'meninggal dunia', 'lainnya'
            ])->nullable();
            $table->enum('Penghasilan_Ibu', [
                'kurang_500.000', '500.000-999.999', '1juta-1.999.999',
                '2juta-4.999.999', '5juta-20juta', 'lebih_20juta', 'tidak_berpenghasilan'
            ])->nullable();
            $table->enum('Berkebutuhan_Khusus_Ibu', [
                'Tidak', 'Netra', 'Rungu', 'Grahita_ringan', 'Grahita_Sedang', 'Daksa_Ringan', 'Daksa_Sedang', 'Laras', 'Wicara',
                'Tuna_ganda', 'Hiper_aktif', 'Cerdas_Istimewa', 'Bakat_Istimewa', 'Kesulitan_Belajra', 'Narkoba', 'Indigo', 'Down_Sindrome', 'Autis'
            ])->nullable();
            $table->string('Nama_Wali')->nullable();
            $table->string('NIK_Wali')->nullable();
            $table->date('Tanggal_Lahir_Wali')->nullable();
            $table->enum('Pendidikan_Wali', ['Tidak sekolah', 'Putus SD', 'SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'D4/S1', 'S2', 'S3'])->nullable();
            $table->enum('Pekerjaan_Wali', [
                'tidak bekerja', 'Nelayan', 'Petani', 'PNS/TNI/POLRI', 'Karyawan Swasta',
                'Pedagang Kecil', 'Pedagang besar', 'wiraswasta', 'wirausaha', 'buruh', 'pensiunan', 'meninggal dunia', 'lainnya'
            ])->nullable();
            $table->enum('Penghasilan_Wali', [
                'kurang_500.000', '500.000-999.999', '1juta-1.999.999',
                '2juta-4.999.999', '5juta-20juta', 'lebih_20juta', 'tidak_berpenghasilan'
            ])->nullable();
            $table->string('No_Tlp_Rumah')->nullable();
            $table->string('No_HP')->nullable();
            $table->string('email')->nullable();
            $table->string('Tinggi_Badan')->nullable();
            $table->string('Berat_Badan')->nullable();
            $table->enum('Jarak', ['Kurang_1KM', 'Lebih_1KM'])->nullable();
            $table->string('Jarak_Sebut')->nullable();
            $table->string('Waktu_Tempuh')->nullable();
            $table->string('Jumlah_Saudara')->nullable();
            $table->enum('Jenis_Pendaftaran', ['Siswa_Baru', 'Pindahan', 'Sekolah_Lagi'])->nullable();
            $table->string('No_Induk')->nullable();
            $table->date('Tanggal_Masuk')->nullable();
            $table->string('Sekolah_Sebelumnya')->nullable();
            $table->enum('Masuk_Rombel', ['A', 'B'])->nullable();
            $table->enum('keluar', ['Lulus', 'Mutasi', 'Dikeluarkan', 'Mengundurkan Diri', 'Putus Sekolah', 'Wafat', 'Hilang', 'Lainnya'])->nullable();
            $table->date('Tanggal_Keluar')->nullable();
            $table->string('Alasan_Keluar')->nullable();
            $table->tinyInteger('verifikasi')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftaran2');
    }
}
