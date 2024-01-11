@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header" style="text-align: center">
                        Form Terima Barang
                    </div>
                    <form method="post" action="/penerimaan" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    @csrf
                                    <input type="hidden" name="pembelian_id" value="{{ $pembelian->id }}">
                                    <input type="hidden" name="jumlah_beli" value="{{ $pembelian->jumlah_beli }}">
                                    <div class="form-group">
                                        <label for="tanggal">ID Paket</label>
                                        <input type="text" class="form-control" name="pembelian_id"
                                            value="{{ $pembelian->id_paket }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal">Tanggal Penerimaan</label>
                                        <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_penerimaan">Jumlah Diterima</label>
                                        <input type="number" class="form-control" name="jumlah_penerimaan"
                                            id="jumlah_penerimaan" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="pengirim">Pengirim</label>
                                        <input type="text" class="form-control" name="pengirim" id="pengirim" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="penerima">Penerima</label>
                                        <input type="text" class="form-control" name="penerima" id="penerima">
                                    </div>
                                    <div class="form-group">
                                        <label for="nomor_surat_jalan">Nomor Surat Jalan</label>
                                        <input type="text" class="form-control" name="nomor_surat_jalan"
                                            id="nomor_surat_jalan" required>
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
