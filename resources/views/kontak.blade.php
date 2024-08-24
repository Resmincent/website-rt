@extends('layouts.fitur')
@section('landing')
<!-- Jumbotron -->
<div class="jumbotron1 jumbotron-fluid">
    <div class="container text-center">
        <h1 class="display-4">KONTAK KAMI</h1>
    </div>
</div>
<!-- Akhir Jumbotron -->

<!-- Konten Utama -->
<div class="container my-5">
    <div class="row">
        <div class="col-md-4">
            <h2>Tentang Kami</h2>
            <p>Desa Bojong Kulur adalah sebuah RT yang berada di Jl.Saluyu-3, Kec.Gunung Putri, Kab.bogor, Jawa Barat</p>
            <div class="social d-flex">
                <a href="#" class="text-white mr-3"><span class="fab fa-facebook-f"></span></a>
                <a href="#" class="text-white mr-3"><span class="fab fa-whatsapp"></span></a>
                <a href="#" class="text-white mr-3"><span class="fab fa-instagram"></span></a>
                <a href="#" class="text-white"><span class="fab fa-youtube"></span></a>
            </div>
        </div>
        <div class="col-md-4">
            <h2>Alamat</h2>
            <div class="mb-3">
                <span class="fas fa-map-marker-alt"></span> RT03, Jl.Saluyu-3, Kec.Gunung Putri, Kab.bogor, Jawa Barat
            </div>
            <div class="mb-3">
                <span class="fas fa-phone-alt"></span> +089-765432100
            </div>
            <div class="mb-3">
                <span class="fas fa-envelope"></span> rt0301@gmail.com
            </div>
        </div>
        <div class="col-md-4">
            <h2>Kontak Kami</h2>
            @if(Session::has('status'))
            <div class="alert alert-success">{{ Session::get('status') }}</div>
            @endif
            <form action="{{ route('contact.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" required>
                </div>
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="message">Pesan</label>
                    <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>
</div>
<!-- Akhir Konten Utama -->

<!-- Footer -->
<footer class="text-center mt-5">
    <div class="container">
        <div class="bottom">
            <span class="far fa-copyright"></span> 2024 All rights reserved.
        </div>
    </div>
</footer>
@endsection
