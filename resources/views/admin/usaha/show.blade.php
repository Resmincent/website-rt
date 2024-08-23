@extends('adminlte.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Usaha Warga</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Usaha Warga</li>
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
                        <label for="gambar">Gambar</label>
                        @if ($usahaWarga->gambar)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $usahaWarga->gambar) }}" class="rounded" style="width: 150px;">
                        </div>
                        @else
                        <p>Tidak ada gambar</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="nama_usaha">Nama Usaha</label>
                        <p>{{ $usahaWarga->nama_usaha }}</p>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <p>{{ $usahaWarga->deskripsi }}</p>
                    </div>

                    <div class="text-right">
                        <a href="{{ route('usahawarga.index') }}" class="btn btn-outline-secondary mr-2" role="button">Kembali</a>
                        <a href="{{ route('usahawarga.edit', $usahaWarga->id) }}" class="btn btn-warning" role="button">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
