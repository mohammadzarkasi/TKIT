<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>RoyalUI Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href={{asset("assets/vendors/ti-icons/css/themify-icons.css")}}>
  <link rel="stylesheet" href={{asset("assets//vendors/base/vendor.bundle.base.css")}}>
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href={{asset("assets//css/style.css")}}>
  <!-- endinject -->
  <link rel="shortcut icon" href={{asset("assets/images/favicon2.png")}} />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src={{asset("assets/images/logo.svg")}} alt="logo">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Join us today! It takes only few steps</h6>
              <form action="{{ url('register/register') }}" method="POST" class="pt-3">
                @csrf
                <div class="form-group">
                  <label>Nama Orang Tua/Wali</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-user text-primary"></i>
                      </span>
                    </div>
                    <input name="name" type="text" class="form-control form-control-lg border-left-0" placeholder="Nama">
                  </div>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-user text-primary"></i>
                      </span>
                    </div>
                    <input name="alamat" type="text" class="form-control form-control-lg border-left-0" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <label>No HP</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-user text-primary"></i>
                      </span>
                    </div>
                    <input name="no_hp" type="text" class="form-control form-control-lg border-left-0" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <label>Pekerjaan</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-user text-primary"></i>
                      </span>
                    </div>
                    <input name="pekerjaan" type="text" class="form-control form-control-lg border-left-0" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-email text-primary"></i>
                      </span>
                    </div>
                    <input name="email" type="email" class="form-control form-control-lg border-left-0" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-lock text-primary"></i>
                      </span>
                    </div>
                    <input name="password" type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password">                        
                  </div>
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      I agree to all Terms & Conditions
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <input type="submit" value="SIGN UP" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.html" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 register-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2020  All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src={{asset("assets//js/off-canvas.js")}}></script>
  <script src={{asset("assets//js/hoverable-collapse.js")}}></script>
  <script src={{asset("assets//js/template.js")}}></script>
  <script src={{asset("assets//js/todolist.js")}}></script>
  <!-- endinject -->
</body>

</html>

