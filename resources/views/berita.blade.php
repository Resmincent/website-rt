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
            <h1 style="font-family: Techno, Impact, sans-serif;">KEGIATAN RT</h1>
        </div>
    </div>
</div>


<!-- artikel -->
<div class="container">
    <div class="row">
        <div id="carouselExampleControls" class="col-lg-6 col-sm-12 carousel slide mt-5" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/img/kegiatan1.jpg" class="d-block w-100" alt="kegiatan1">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/kegiatan2.jpg" class="d-block w-100" alt="kegiatan2">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/kegiatan1.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
        <div class="col-lg-6 col-sm-12 mt-5">
            <h2>Penanaman Bibit Jahe</h2>
            <p style="font-size: 18px;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim delectus ea aspernatur sint maxime ipsa voluptatum non hic, eaque natus dolores magni facilis repudiandae voluptate odit vero. Dolorem, aspernatur quisquam?</p>
        </div>
    </div>
</div>
<!-- akhir artikel -->
@endsection
