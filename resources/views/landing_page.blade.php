<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Info Cupang Gan | Landing Page</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .navbar-brand {
            font-weight: 600;
        }

        .jumbotron {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/api/placeholder/1200/400');
            background-size: cover;
            background-position: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            height: 400px;
            display: flex;
            align-items: center;
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #007bff;
        }

        .cta-section {
            background-color: #f8f9fa;
            padding: 4rem 0;
        }

    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('assets/dist/img/head.png')}}" alt="Info Cupang Gan Logo" width="30" height="30" class="d-inline-block align-top mr-2">
                Komunitas Bluerim
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#perawatan">Perawatan Cupang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#event">Event Kontes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-primary text-white" href="{{ route('login') }}" style="border-radius: 12px; width: 60px">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid mb-0" style="background-image: url('{{ asset('assets/dist/img/bg1.png') }}')">
        <div class="container text-center">
            <h1 class="display-4">Welcome to Komunitas Bluerim</h1>
            <p class="lead">Tentang Jenis Bluerim</p>
            <a href="#jenis" class="btn btn-primary btn-lg mt-3">Baca Selengkapnya</a>
        </div>
    </div>

    <!-- About Section -->
    <section id="jenis" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Jenis Bluerim</h2>
            <div class="row">
                @forelse ($jenis as $j)
                <div class="col-sm-6 col-lg-4 col-md-6 p-2 d-flex justify-content-center">
                    <div class="card p-lg-4 p-md-3 p-sm-4 mb-20 col-sm-12 mx-auto">
                        <img src="{{ asset("/storage/jenis/" . $j->gambar) }}" class="card-img-top border border-2" alt="{{ $j->nama_jenis }}">
                        <div class="card-text m-2">
                            <h5 class="card-title font-weight-bold" style="font-size: 24px;">{{ $j->nama_jenis }}</h5>
                            <p class="card-text">{{ $j->deskripsi }}</p>
                        </div>

                    </div>
                </div>
                @empty
                <p>Jenis Tidak Tersedia.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="perawatan" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Cara Perawatan Bluerim</h2>
            <div class="row">
                @forelse ($jenis as $j)
                <div class="col-sm-6 col-lg-4 col-md-6 p-2 d-flex justify-content-center">
                    <div class="card p-lg-4 p-md-3 p-sm-4 mb-20 col-sm-12 mx-auto">
                        <div class="card-text m-2">
                            <h5 class="card-title font-weight-bold" style="font-size: 24px;">{{ $j->nama_jenis }}</h5>
                            <p class="card-text">{{ $j->perawatan }}</p>
                        </div>

                    </div>
                </div>
                @empty
                <p>Jenis Tidak Tersedia.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container text-center">
            <h2 class="mb-4">Event Kontes</h2>
            <div class="row">
                @forelse ($events as $e)
                <div class="col-sm-6 col-lg-4 col-md-6 p-2 d-flex justify-content-center">
                    <div class="card p-lg-4 p-md-3 p-sm-4 mb-20 col-sm-12 mx-auto">
                        <img src="{{ asset("/storage/artikels/" . $e->gambar) }}" class="card-img-top border border-2" alt="{{ $e->judul }}">
                        <div class="card-text m-2">
                            <h5 class="card-title font-weight-bold" style="font-size: 24px;">{{ $e->judul }}</h5>
                            <p class="card-text">{{ $e->deskripsi }}</p>
                        </div>

                    </div>
                </div>
                @empty
                <p>Kontes Tidak Tersedia.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Komunitas Bluerim</h5>
                </div>
                <div class="col-md-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light">Beranda</a></li>
                        <li><a href="#jenis" class="text-light">Jenis Bluerim</a></li>
                        <li><a href="#perawatan" class="text-light">Cara Perawatan</a></li>
                        <li><a href="#event" class="text-light">Event Kontes</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Follow Us</h5>
                    <a href="#" class="text-light mr-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-light mr-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-light mr-2"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <hr class="bg-light">
            <div class="text-center">
                <small>&copy; 2024 Info Cupang Gan. All rights reserved.</small>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
