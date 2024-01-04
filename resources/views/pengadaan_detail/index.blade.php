@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-thumbs-up"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">TOTAL PAKET PENGADAAN</span>
                        <span class="info-box-number">
                            <h3></h3>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>KODE REKENING</th>
                                    <th>NAMA BARANG/JASA</th>
                                    <th>JUMLAH</th>
                                    <th>HARGA</th>
                                    <th>SUBTOTAL</th>
                                    <th>LINK REF</th>
                                    <th>OPSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengadaan_detail as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->usulan_detail->barang->kodeRekening->nama_rekening }}</td>
                                        <td>{{ $item->usulan_detail->barang->nama }}</td>
                                        <td>{{ $item->usulan_detail->jumlah }} {{ $item->usulan_detail->satuan }}</td>
                                        <td>Rp. {{ number_format($item->usulan_detail->harga) }}</td>
                                        <td>Rp.
                                            {{ number_format($item->usulan_detail->jumlah * $item->usulan_detail->harga) }}
                                        </td>
                                        <td><a href="{{ $item->usulan_detail->link_1 }}" class="badge badge-info">Link 1</a>
                                            <a href="{{ $item->usulan_detail->link_2 }}" class="badge badge-info">Link 2</a>
                                            <a href="{{ $item->usulan_detail->link_3 }}" class="badge badge-info">Link 3</a>
                                        </td>
                                        <td><a class="btn btn-primary btn-sm"
                                                href="{{ route('view-usulan-detail', ['id' => $item->usulan_detail->id]) }}">
                                                <i class="fas fa-folder">
                                                </i>
                                                View
                                            </a></td>
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
