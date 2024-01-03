@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-thumbs-up"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">TOTAL USULAN</span>
                        <span class="info-box-number">
                            <h3>Rp. {{ number_format($total) }}</h3>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Usulan #{{ $data_usulan->id }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <dl class="row">
                            <dt class="col-sm-3">TAHUN USULAN</dt>
                            <dd class="col-sm-9">{{ $data_usulan->tahun }}</dd>
                            <dt class="col-sm-3">TANGGAL USULAN</dt>
                            <dd class="col-sm-9">{{ $data_usulan->tanggal_usulan }}</dd>
                            <dt class="col-sm-3">NAMA USULAN</dt>
                            <dd class="col-sm-9">{{ $data_usulan->nama_usulan }}</dd>
                        </dl>
                    </div>
                    <div class="col">
                        <dl class="row">
                            <dt class="col-sm-3">UNIT KERJA</dt>
                            <dd class="col-sm-9">{{ $data_usulan->unit_kerja['nama'] }}</dd>
                            <dt class="col-sm-3">DESKRIPSI</dt>
                            <dd class="col-sm-9">{{ $data_usulan->deskripsi }}</dd>
                            <dt class="col-sm-3">INDIKATOR</dt>
                            <dd class="col-sm-9">{{ $data_usulan->indikator }}</dd>
                        </dl>
                    </div>
                    <div class="col">
                        <dl class="row">
                            <dt class="col-sm-3">TARGET</dt>
                            <dd class="col-sm-9">{{ $data_usulan->target }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <a href="{{ route('create-usulan-detail', ['id' => $data_usulan->id]) }}"
                                class="btn btn-success"><i class="fas fa-plus-square"></i>
                                Tambah Rincian</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NAMA REKENING</th>
                                    <th>BARANG</th>
                                    <th>JUMLAH</th>
                                    <th>SATUAN</th>
                                    <th>LINK</th>
                                    <th>HARGA SATUAN</th>
                                    <th>SUBTOTAL</th>
                                    <th>OPSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_usulan_detail as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->barang->kodeRekening->nama_rekening }}</td>
                                        <td>{{ $item->barang->nama }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->satuan }}</td>
                                        <td>
                                            <a href="{{ $item->link_1 }}" class="badge badge-info">Link 1</a>
                                            <a href="{{ $item->link_2 }}" class="badge badge-info">Link 2</a>
                                            <a href="{{ $item->link_3 }}" class="badge badge-info">Link 3</a>
                                        </td>
                                        <td>Rp. {{ number_format($item->harga) }}</td>
                                        <td>Rp. {{ number_format($item->jumlah * $item->harga) }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('view-usulan-detail', $item->id) }}">
                                                <i class="fas fa-folder">
                                                </i>
                                                View
                                            </a>
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
