@extends('adminlte.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Kegiatan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Kegiatan</li>
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
                        <img class="w-25 img-thumbnail" style="border-radius: 10px;" src="{{ asset("/storage/artikels/" . $kegiatan->gambar) }}" class="rounded">
                    </div>

                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <p id="judul">{{ $kegiatan->judul }}</p>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <p id="deskripsi">{{ $kegiatan->deskripsi }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
@endsection
