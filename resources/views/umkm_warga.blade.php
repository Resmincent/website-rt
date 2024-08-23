@extends('layouts.fitur')
@section('landing')
<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Berita</h1>
    </div>
</div>
<!-- Akhir Jumbotron -->

<div class="container">
    <div class="row">
        <div class="col-sm-12 mt-5">
            <h1 style="font-family: Techno, Impact, sans-serif;">Usaha Warga</h1>
        </div>
    </div>
</div>


<!-- artikel -->
<div class="container">
    <div class="row">
        @foreach ($usahas as $usaha )
        <div id="carouselExampleControls" class="col-lg-6 col-sm-12 carousel slide mt-5" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset("/storage/usaha_warga/" . $berita->gambar) }}" class="card-img-top border border-2" alt="{{ $berita->judul }}">
                </div>
            </div>

        </div>
        <div class="col-lg-6 col-sm-12 mt-5">
            <h2>{{ $usaha->nama_usaha }}</h2>
            <p style="font-size: 18px;">{{ $usaha->deskripsi }}</p>
        </div>
        @endforeach

    </div>
</div>
<!-- akhir artikel -->
@endsection
