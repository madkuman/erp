@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header" style="text-align: center">
                        Form Pembayaran
                    </div>
                    <form method="post" action="{{ route('store-pembayaran') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <input type="hidden" name="pembelian_id" value="{{ $pembelian->id }}">
                                    <input type="hidden" name="jumlah_beli" value="{{ $pembelian->jumlah_beli }}">
                                    <div class="form-group">
                                        <label for="id_paket">ID Paket</label>
                                        <input type="text" class="form-control" name="id_paket"
                                            value="{{ $pembelian->id_paket }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
                                        <input type="date" class="form-control" name="tanggal_pembayaran"
                                            id="tanggal_pembayaran" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nilai_pembayaran">Nilai Pembayaran</label>
                                        <input type="number" class="form-control" name="nilai_pembayaran"
                                            id="nilai_pembayaran" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Invoice</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                                    name="invoice">
                                                <label class="custom-file-label" for="exampleInputFile">Pilih
                                                    file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Kuitansi</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                                    name="kuitansi">
                                                <label class="custom-file-label" for="exampleInputFile">Pilih
                                                    file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">File</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                                    name="file">
                                                <label class="custom-file-label" for="exampleInputFile">Pilih
                                                    file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('index-pembayaran') }}" class="btn btn-default">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
