@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Penerimaan Barang</h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th>ID Paket</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Beli</th>
                                    <th>Harga Beli</th>
                                    <th>Catatan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_pembelian as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->id_paket }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{{ $item->usulan_detail['barang']['nama'] }}</td>
                                        <td>{{ $item->jumlah_beli }} {{ $item->usulan_detail['barang']['satuan'] }}</td>
                                        <td>Rp. {{ number_format($item->harga_beli) }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>
                                            @if ($barang_belum_diterima->contains($item))
                                                <a href="{{ route('create-penerimaan', $item->id) }}"
                                                    class="btn btn-sm btn-primary">Proses
                                                    Terima</a>
                                            @else
                                                <span class="badge badge-info">Barang sudah diterima</span>
                                            @endif
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