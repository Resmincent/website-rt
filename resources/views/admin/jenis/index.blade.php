@extends('adminlte.layouts.app')
@section('addCss')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
@endsection

@section('addJavascript')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
<script>
    $(function() {
        $("#data-table").DataTable();
    })

    function confirmDelete(button) {
        var url = button.dataset.url;
        Swal.fire({
            title: 'Konfirmasi Hapus'
            , text: 'Apakah Kamu Yakin Ingin Menghapus Data Ini?'
            , icon: 'warning'
            , showCancelButton: true
            , confirmButtonColor: '#3085d6'
            , cancelButtonColor: '#d33'
            , confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = url;
            }
        });
    }

</script>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Jenis</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Jenis</li>
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
                <div class="card-header text-right">
                    <a href="{{ route('create-jenis') }}" class="btn btn-primary" role="button">Tambah Jenis</a>
                </div>
                <div class="card-body p-1 table-responsive">
                    <table class="table table-hover mb-0" id="data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Jenis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jeniss as $jenis)
                            <tr>
                                <td> {{ $loop->index + 1 }}</td>
                                <td> {{ $jenis->nama_jenis }}</td>
                                <td>
                                    <a href="{{route('edit-jenis', ['id' => $jenis->id])}}" class="btn btn-warning btn-sm" role="button">Edit</a>
                                    <a href="{{route('detail-jenis', ['id' => $jenis->id])}}" class="btn btn-primary btn-sm" role="button">Lihat</a>
                                    <a onclick="confirmDelete(this)" data-url="{{ route('delete-jenis', ['id' => $jenis->id]) }}" class="btn btn-danger btn-sm" role="button">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
