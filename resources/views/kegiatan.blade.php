@extends('layouts.fitur')
@section('landing')
<!-- Jumbotron -->
<div class="jumbotron1 jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">GALERI KEGIATAN</h1>
    </div>
</div>
<!-- Akhir Jumbotron -->

<!-- Judul -->
<div class="container">
    <div class="row mt-5">
        <h1 style="font-family: Techno, Impact, sans-serif;">GALERI KAMI</h1>
    </div>
</div>
<!-- Akhir judul -->

<!-- card -->
<div class="container card">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card" style="width: 20rem;">
                @foreach ($kegiatans as $kegiatan )
                <div class="inner">
                    <img src="{{ asset("/storage/jenis/" . $kegiatan->gambar) }}" class="card-img-top border border-2" alt="kegiatan">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $kegiatan->judul }}</h5>
                    <p class="card-text">{{ $kegiatan->deskripsi }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- akhir card -->
@endsection
