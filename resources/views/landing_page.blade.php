@extends('layouts.fitur')
@section('landing')
<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Selamat Datang Di Website RT03 Desa BOJONG KULUR
        </h1>
    </div>
</div>
<!-- Akhir Jumbotron -->


<!-- Container -->
<div class="container">

    <!-- Info Panel -->
    <div class="row justify-content-center">
        <div class="col-10 info-panel">
            <div class="row">
                <div class="col-lg">
                    <img src="{{ asset('assets/dimas/img/penduduk.png') }}" alt="employee">
                    <h4>{{ $keluarga_count }}</h4>
                    <p>Keluarga</p>
                </div>
                <div class="col-lg">
                    <img src="{{ asset('assets/dimas/img/pria.png') }}" alt="hires">
                    <h4>{{ $pria_count }}</h4>
                    <p>LAKI-LAKI</p>
                </div>
                <div class="col-lg">
                    <img src="{{ asset('assets/dimas/img/wanita.png') }}" alt="security">
                    <h4>{{ $wanita_count }}</h4>
                    <p>PEREMPUAN</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Info Panel -->

    <!-- Workingspace -->
    <div class="row workingspace">
        <div class="col-lg-6 animate__animated animate__fadeInLeft animate__delay-1s">
            <img src="{{ asset('assets/dimas/img/workingspace.png') }}" alt="workingspace" class="img-fluid">
        </div>
        <div class="col-lg-5 animate__animated animate__fadeInRight animate__delay-2s">
            <h3><span id="1">Lingkungan</span></h3>
            <p>RT03 Bojong kulur adalah sebuah RT yang berada di Jl.Saluyu-3, Kecamatan Gunung Putri, Kabupaten Bogor, Jawa Barat.<p>
                    <a href="" class="btn btn-primary tombol">Galeri</a>
        </div>
        <div class="col-lg-6 mt-5 animate__animated animate__fadeInLeft animate__delay-4s">
            <img src="{{ asset('assets/dimas/img/sawah.jpeg') }}" alt="workingspace" class="img-fluid">
        </div>
        <div class="col-lg-5 mt-3 animate__animated animate__fadeInRight animate__delay-5s">
            <h3><span>Fungsi Pengurus RT</span></h3>
            <ol>
                <li>Membantu tugas di bidang pelayanan administrasi kependudukan dan administrasi pemerintahan yang lain.</li>
                <li>Pemeliharaan keamanan, ketertiban dan kerukunan antar warga.</li>
                <li>Penggerak swadaya gotong royong dan partisipasi masyarakat.</li>
                <li>Mediasi komunikasi, informasi, sosialisasi antara pemerintah daerah dan masyarakat.</li>
                <li>Merupakan wadah untuk melaksanakan kegiatan dengan semangat kekeluargaan dan gotongroyong.</li>
            </ol>
        </div>
        <h3 id="visi&misi" class="mt-5">Visi & Misi</h3>
        <div class="col-lg-6 mt-5">
            <img src="{{ asset('assets/dimas/img/visi&misi.svg') }}" alt="workingspace" class="img-fluid">
        </div>
        <div class="col-lg-6 mt-3">
            <p>
                <a class="btn btn-primary visi" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Klik Disini Untuk Melihat Visi & Misi</a>
                <div class="row">
                    <div class="col">
                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                            <div class="card card-body">
                                <p>Visi : Membentuk kerukunan warga RT 03 RW 01 dan memelihara lingkungan yang aman,nyaman,tentram,bersih,sehat,cerdas dan kreatif serta membangun kerjasama lingkungan yang harmonis.</p>
                                <p> Misi :</p>
                                <ol>
                                    <li>Menjaga kerukunan warga dengan kegiatan yang positif.</li>
                                    <li>Melayani dan memberikan pelayanan administrasi yang jujur dan transparan.</li>
                                    <li>Memberikan wadah fasilitas sebagai bagian dari pengembangan bakat warga.</li>
                                    <li>Bersama-sama menjaga keamanan,ketertiban dan kebersihan lingkungan.</li>
                                    <li>Menjalin kerja sama yang bermanfaat dengan berbagai lembaga eksternal.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
            </p>
        </div>
    </div>
    <!-- Akhir workingspace -->

    <!-- Daftar pengurus  -->
    <section class="pengurus">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h3>MOTTO</h3>
                <h5>" Guyub rukun dan gotong royong menciptakan lingkungan yang harmonis, aman, nyaman, cerdas dan kreatif. "</h5>
            </div>
        </div>

        <!-- <div class="row justify-content-center">
        <div class="col-6 justify-content-center d-flex">
          <figure class="figure">
            <img src="assets/img/img1.png" class="figure-img img-fluid rounded-circle" alt="pengurus 1">
          </figure>
          <figure class="figure">
            <img src="assets/img/img2.png" class="figure-img img-fluid rounded-circle" alt="pengurus 2">
            <figcaption class="figure-caption">
              <h5>Sunny Ye</h5>
              <p>Designer</p>
            </figcaption>
          </figure>
          <figure class="figure">
            <img src="assets/img/img3.png" class="figure-img img-fluid rounded-circle" alt="pengurus 3">
          </figure>
        </div>
      </div> -->
    </section>
    <!-- Akhir Pengurus -->
</div>
<!-- Akhir Container -->
@endsection
