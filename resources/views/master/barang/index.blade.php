@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Master Barang</h3>
                        <div class="card-tools">
                            <a href="/master/barang/create" class="btn btn-success"><i class="fas fa-plus-square"></i>
                                Tambah Barang</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 5%">ID</th>
                                    <th style="width: 25%">Kode Rekening</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th style="width: 5%">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->kodeRekening['nama_rekening'] }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->satuan }}</td>
                                        <td>{{ $item->harga }}</td>
                                        <td>
                                            <a href="/master/barang/{{ $item->id }}/edit"><i
                                                    class="fas fa-edit"></i></a>
                                            <form action="/master/barang/{{ $item->id }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"
                                                    onclick="return confirm('Apakah yakin ingin menghapus data?')"
                                                    class="btn btn-danger btn-sm">Hapus</button>
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

    <!-- Modal Create-->
    <div class="modal fade" id="create_kode_rekening" data-backdrop="static" data-keyboard="false"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Kode Rekening</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store_kode_rekening') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="kode" class="col-form-label">Kode Rekening:</label>
                            <input type="kode" name="kode" class="form-control" id="kode">
                        </div>
                        <div class="form-group">
                            <label for="nama" class="col-form-label">Nama Rekening:</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="parent" class="col-form-label">Parent:</label>
                            <select class="form-control" data-width="100%" name="parent" id="parent_kode_rekening">
                                <option value=""></option>
                                @foreach ($data as $option)
                                    <option value="{{ $option->id }}">{{ $option->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit-->
    <div class="modal fade" id="create_kode_rekening" data-backdrop="static" data-keyboard="false"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Kode Rekening</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update_kode_rekening') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="kode" class="col-form-label">Kode Rekening:</label>
                            <input type="kode" name="kode" class="form-control" id="kode">
                        </div>
                        <div class="form-group">
                            <label for="nama" class="col-form-label">Nama Rekening:</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="parent" class="col-form-label">Parent:</label>
                            <select class="form-control" data-width="100%" name="parent" id="parent_kode_rekening">
                                <option value=""></option>
                                @foreach ($data as $option)
                                    <option value="{{ $option->id }}">{{ $option->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
