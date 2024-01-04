@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Paket Pengadaan
                        </h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th style="width: 25%">Nama Pengadaan</th>
                                    <th>Terbayar</th>
                                    <th>Dibuat pada</th>
                                    <th style="width: 15%">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_pengadaan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td></td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ route('pengadaan-detail', ['id' => $item->id]) }}"
                                                class="btn btn-primary btn-sm">Rincian</a>
                                            <a href="" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="" method="post" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah yakin ingin menghapus data?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection
