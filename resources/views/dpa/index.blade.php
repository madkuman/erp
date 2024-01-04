@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen Pelaksanaan Anggaran</h3>
                        <div class="card-tools">

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-header">
                        <h3 class="card-title">Filter Data</h3>
                        <div class="card-tools">

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <form action="/pengadaan" method="post">
                        <div class="card-body">
                            @csrf
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 3%">#</th>
                                        <th>NAMA REKENING</th>
                                        <th>BARANG</th>
                                        <th>JUMLAH</th>
                                        <th>HARGA SATUAN</th>
                                        <th>SUBTOTAL</th>
                                        <th>LINK</th>
                                        <th>JUSTIFIKASI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_dpa as $item)
                                        <tr>
                                            <td><input type="checkbox" name="selectedItems[]" value="{{ $item->id }}">
                                            </td>
                                            <td>{{ $item->barang->kodeRekening->nama_rekening }}</td>
                                            <td>{{ $item->barang->nama }}</td>
                                            <td>{{ $item->jumlah }} {{ $item->satuan }}</td>
                                            <td>{{ $item->harga }}</td>
                                            <td>Rp. {{ number_format($item->jumlah * $item->harga) }}</td>
                                            <td>
                                                <a href="{{ $item->link_1 }}" class="badge badge-info">Link 1</a>
                                                <a href="{{ $item->link_2 }}" class="badge badge-info">Link 2</a>
                                                <a href="{{ $item->link_3 }}" class="badge badge-info">Link 3</a>
                                            </td>
                                            <td>{{ $item->justifikasi }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#input_nama_pengadaan">Proses</button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="input_nama_pengadaan" data-backdrop="static" data-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Lanjut Proses Pengadaan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="nama">Nama Paket Pengadaan</label>
                                        <input type="text" class="form-control" name="nama" id="nama"
                                            placeholder="Cth: Pengadaan Barang Laptop" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Proses</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
