@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header" style="text-align: center">
                        Form Uji fungsi
                    </div>
                    <form method="post" action="{{ route('store-uji-fungsi') }}" enctype="multipart/form-data">
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
                                        <label for="tanggal_uji_fungsi">Tanggal Uji Fungsi</label>
                                        <input type="date" class="form-control" name="tanggal_uji_fungsi"
                                            id="tanggal_uji_fungsi" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="link">Link Bukti</label>
                                        <input type="text" class="form-control" name="link" id="link" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <input type="text" class="form-control" name="status" id="status">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
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
                                    <div class="form-group">
                                        <label for="link">Keterangan</label>
                                        <textarea name="keterangan" id="" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('index-uji-fungsi') }}" class="btn btn-default">Kembali</a>
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
