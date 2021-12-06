<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{ $title }}</title>
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
              @yield('content')
          </div>
        </div>
      </div>
    </div>
  </div>
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