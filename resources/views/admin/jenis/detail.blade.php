@extends('adminlte.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Jenis</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Jenis</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <img class="w-25 img-thumbnail" style="border-radius: 10px;" src="{{ asset("/storage/jenis/" . $jenis->gambar) }}" class="rounded">
                    </div>

                    <div class="form-group">
                        <label for="nama_jenis">Nama Jenis</label>
                        <p id="nama_jenis">{{ $jenis->nama_jenis }}</p>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <p id="deskripsi">{{ $jenis->deskripsi }}</p>
                    </div>

                    <div class="form-group">
                        <label for="cara_perawatan">Cara Perawatan</label>
                        <p id="cara_perawatan">{{ $jenis->perawatan }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
@endsection
