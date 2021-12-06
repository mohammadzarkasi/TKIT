<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href={{asset("assets/vendors/ti-icons/css/themify-icons.css")}}>
  <link rel="stylesheet" href={{asset("assets/vendors/base/vendor.bundle.base.css")}}>
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href={{asset("assets/css/style.css")}}>
  <!-- endinject -->
  <!-- <link rel="shortcut icon" href={{asset("assets/images/favicon.png")}} /> -->
  <link rel="shortcut icon" href={{asset("assets/images/favicon2.jpg")}} />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo1">
                <img src={{asset("siswa/img/logo1.png")}} alt="logo">
              </div>
              <h4>Silahkan melakukan Login</h4>
              <h6 class="font-weight-light"> dengan email yang telah didaftarkan.</h6>
              <form action="{{ url('/login') }}" method="POST" class="pt-3">
                @csrf
                <!-- <div class="form-group">
                  <input name="name" type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Nama">
                </div> -->
                <div class="form-group">
                  <label>Email</label>
                  <input name="email" type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input name="password" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>

                @if(\Session::has('errmsg'))
                  <div class="text-center font-weight-light text-danger mb-4">
                    {{ \Session::get('errmsg') }}
                  </div>
                @endif


                <div class="text-right font-weight-light">
                  Lupa password? <a href="{{ url('/forgot-password') }}" class="text-primary">Klik di sini</a>
                </div>

                

                <div class="my-3">
                  <input type="submit" value="Login" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Belum punya akun? <a href="{{ url('/register') }}" class="text-primary">Silahkan daftar di sini</a>
                </div>
                <div class="text-center font-weight-light">
                  Atau kembali ke <a href="{{ url('/') }}" class="text-primary">Beranda</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src={{asset("assets/vendors/base/vendor.bundle.base.js")}}></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src={{asset("assets/js/off-canvas.js")}}></script>
  <script src={{asset("assets/js/hoverable-collapse.js")}}></script>
  <script src={{asset("assets/js/template.js")}}></script>
  <script src={{asset("assets/js/todolist.js")}}></script>
  <!-- endinject -->
</body>

</html>