<div class="container">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">DAFTAR AKUN ORANG TUA/WALI</h4>
                <p class="card-description">
                    isi data dengan benar
                </p>
                <form action="#" method="POST" class="forms-sample">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Nama Orang Tua/Wali</label>
                        <input name="nama" type="text" class="form-control" id="Nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Alamat Lengkap</label>
                        <textarea name="#" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">No. HP</label>
                        <input name="nama" type="text" class="form-control" id="Nama" placeholder="No. HP">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Email</label>
                        <input name="nama" type="email" class="form-control" id="Nama" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Pekerjaan</label>
                        <input name="nama" type="text" class="form-control" id="Nama" placeholder="Pekerjaan">
                    </div>
                    <div class="row form-group mt-4">
                        <div class="col-md-12">
                            <button type="submit" value="Send Message" class="btn btn-primary">Daftar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>