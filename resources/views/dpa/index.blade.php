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
                                    <th>SPESIFIKASI</th>
                                    <th>JUSTIFIKASI</th>
                                    <th>HARGA SATUAN</th>
                                    <th>SUBTOTAL</th>
                                    <th style="width: 5%">OPSI</th>
                                </tr>
                            </thead>
                            <tbody>

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
