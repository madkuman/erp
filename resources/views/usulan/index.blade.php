@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Usulan Unit</h3>
                        <div class="card-tools">
                            <a href="/usulan/create" class="btn btn-success"><i class="fas fa-plus-square"></i>
                                Tambah Usulan</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th style="width: 25%">Nama Usulan</th>
                                    <th>Tahun</th>
                                    <th>Unit</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nama_usulan }}</td>
                                        <td>{{ $item->tahun }}</td>
                                        <td>{{ $item->unit_kerja['nama'] }}</td>
                                        <td>
                                            <a href="{{ route('usulan-detail', ['id' => $item->id]) }}"
                                                class="btn btn-primary btn-sm">Rincian</a>
                                            <a href="/usulan/{{ $item->id }}/edit"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="/usulan/{{ $item->id }}" method="post" class="d-inline">
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
