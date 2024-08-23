@extends('adminlte.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail User</li>
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
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <strong>Nama:</strong>
                        </div>
                        <div class="col-md-9">
                            {{ $user->name }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <strong>Email:</strong>
                        </div>
                        <div class="col-md-9">
                            {{ $user->email }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <strong>Role:</strong>
                        </div>
                        <div class="col-md-9">
                            {{ ucfirst($user->role) }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <strong>Jenis Kelamin:</strong>
                        </div>
                        <div class="col-md-9">
                            {{ $user->jenis_kelamin }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <strong>Keluarga:</strong>
                        </div>
                        <div class="col-md-9">
                            @if ($user->keluarga)
                            {{ $user->keluarga->nama }}
                            @else
                            Tidak ada keluarga terkait
                            @endif
                        </div>
                    </div>

                    <div class="text-right">
                        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary mr-2" role="button">Kembali</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary" role="button">Edit User</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
