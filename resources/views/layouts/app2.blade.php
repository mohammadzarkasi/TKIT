<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="copyright" content="MACode ID, https://macodeid.com/">
    <link rel="shortcut icon" href={{asset("assets/images/favicon2.jpg")}} />
    <title>{{ $title ?? '' }} - TKIT Buah Hati Kita</title>

    <link rel="stylesheet" href={{asset("siswa/css/maicons.css")}}>

    <link rel="stylesheet" href={{asset("siswa/css/bootstrap.css")}}>

    <link rel="stylesheet" href={{asset("siswa/vendor/animate/animate.css")}}>

    <link rel="stylesheet" href={{asset("siswa/css/theme.css")}}>

</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
            <div class="container">
                <a class="navbar-brand brand-logo mr-5" href="{{ url('/') }}"><img src={{asset("siswa/img/logo.png")}} class="mr-2" alt="logo" /></a>

                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse" id="navbarContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            {{-- <a class="nav-link" href="https://sites.google.com/view/ikh-buah-hati-kita/home?authuser=0">Profil</a> --}}
                            <a target="_blank" class="nav-link" href="https://tkit-buahhatikita.sch.id">Profil TKIT</a>
                        </li>

                        @if($sess != null)
                        
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('pendaftaran') }}">Pendaftaran</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('pembayaran') }}">Pembayaran</a>
                            </li>

                            <li class="nav-item">
                                <button class="btn btn-primary ml-lg-2" onclick="promptLogout()">Logout</button>
                            </li>
                            

                        @else
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('/register') }}">Daftar Akun</a>
                            </li>

                            <li class="nav-item">
                                <a class="btn btn-primary ml-lg-2" href="{{ url('login') }}">Login</a>
                            </li>
                        @endif
                    </ul>
                </div>

            </div>
        </nav>

    </header>

    @yield('content')

    <!-- <footer class="page-footer bg-image" style="background-image: url(siswa/img/footer.png);"> -->
    <footer class="page-footer bg-image" style="background-image: url({{ asset('siswa/img/footer.png') }});">
        <div class="container">

            <p class="text-center" id="copyright">Copyright &copy; 2021. </p>
                
            <!-- This template design and develop by <a href="https://macodeid.com/" target="_blank">MACode ID</a></p> -->
        </div>
    </footer>

    <script>
        var base_url = '{{ url('/') }}';
        var ___csrf = '{{ csrf_token() }}';
    </script>

    <script src={{asset("siswa/js/jquery-3.5.1.min.js")}}></script>

    <script src={{asset("siswa/js/bootstrap.bundle.min.js")}}></script>

    <script src={{asset("siswa/js/google-maps.js")}}></script>

    <script src={{asset("siswa/vendor/wow/wow.min.js")}}></script>

    <script src={{asset("siswa/js/theme.js")}}></script>
    <script src={{asset("js/common.js")}}></script>

    @yield('js')
    
</body>
</html>