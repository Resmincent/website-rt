@extends('adminlte.layouts.app')
@section('addCss')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
@endsection
@section('addJavascript')
<script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
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
                    <h1 class="m-0">Daftar Event</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Event</li>
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
                    <a href="{{ route('create-event') }}" class="btn btn-primary" role="button">Tambah Event</a>
                </div>
                <div class="card-body p-1 table-responsive">
                    <table class="table table-hover mb-0" id="data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($events as $event)
                            <tr>
                                <td> {{ $loop->index + 1 }}</td>
                                <td class="text-center"><img src="{{ asset("/storage/artikels/" . $event->gambar) }}" class="rounded" style="width: 50px"></td>
                                <td> {{ $event->judul }} </td>
                                <td> {{ $event->deskripsi }} </td>
                                <td class="text-center">
                                    <a href="{{route('edit-event', ['id' => $event->id])}}" class="btn btn-warning btn-sm" role="button">Edit</a>
                                    <a href="{{route('detail-event', ['id' => $event->id])}}" class="btn btn-primary btn-sm" role="button">Lihat</a>
                                    <a onclick="confirmDelete(this)" data-url="{{ route('delete-event', ['id' => $event->id]) }}" class="btn btn-danger btn-sm" role="button">Hapus</a>

                                </td>
                            </tr>
                            @empty
                            @endforelse
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
