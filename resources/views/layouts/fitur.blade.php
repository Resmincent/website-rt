<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- My CSS -->
    <link rel="stylesheet" href={{ asset('assets/dimas/style.css') }}>
    <!-- Animation css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- import fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <!-- My Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">

    <title>Selamat Datang Di Website RT03 Desa BOJONG KULUR
    </title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top sticky bgcolor">
        <div class="container">
            <a class="navbar-brand" href="#">RT03 Bojong Kulur</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" style="color: white;">
                <span class="navbar-toggler-icon"><i class="fas fa-bars" style="color:#fff; font-size:28px;"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" aria-current="page" href="{{ route('landing') }}">Beranda</a>
                    <a class="nav-item dropdown nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profil</a>
                    <ul class="dropdown-menu drop-profil" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#visi&misi">Visi Misi</a></li>
                        <li><a class="dropdown-item" href="#">Laporan</a></li>
                        <li><a class="dropdown-item" href="{{ route('tentang-kami') }}">Tentang Kami</a></li>
                    </ul>
                    <a class="nav-item dropdown nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Berita</a>
                    <ul class="dropdown-menu drop-berita" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="kegiatan.html">Kegiatan RT</a></li>
                        <li><a class="dropdown-item" href="usaha_warga.html">Usaha Warga</a></li>
                    </ul>
                    <a class="nav-item nav-link" href="galeri_kegiatan.html">Galeri Kegiatan</a>
                    <a class="nav-item nav-link" href="kontak.html">Kontak</a>
                    <a class="nav-link btn-primary text-white" href="{{ route('login') }}" style="border-radius: 12px; width: 60px">Login</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar Akhir -->
    @yield('landing')
    <!-- Footer -->
    <div class="row footer">
        <div class="col text-center">
            <p>&copy2024 All Rights Reserved</p>
        </div>
    </div>

    <script type="text/javascript">
        window.addEventListener("scroll", function() {
            var nav = document.querySelector("nav");
            nav.classList.toggle("sticky", window.scrollY > 100);
        });

    </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> -->
</body>
</html>
