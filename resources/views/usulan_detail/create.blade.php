@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Rincian Usulan: {{ $data_usulan->nama_usulan }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="{{ route('store-usulan-detail') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" name="usulan_id" value="{{ $data_usulan->id }}">
                                    <div class="form-group">
                                        <label for="nama_barang">Nama Barang</label>
                                        <select name="barang" class="form-control select2bs4" style="width: 100%" required>
                                            <option value="">-Pilih Barang-</option>
                                            @foreach ($data_barang as $option)
                                                <option value="{{ $option->id }}">{{ $option->nama }} -
                                                    {{ $option->harga }} -
                                                    {{ $option->satuan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="harga_satuan">Harga Satuan</label>
                                        <input type="number" name="harga_satuan" class="form-control"
                                            placeholder="Masukkan harga satuan" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah</label>
                                        <input type="number" name="jumlah" class="form-control"
                                            placeholder="Masukkan jumlah barang" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="link_1">Link 1</label>
                                        <input type="text" class="form-control" name="link_1"
                                            placeholder="Tambahkan Link 1" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="link_2">Link 2</label>
                                        <input type="text" class="form-control" name="link_2"
                                            placeholder="Tambahkan Link 2" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="link_3">Link 3</label>
                                        <input type="text" class="form-control" name="link_3"
                                            placeholder="Tambahkan Link 3" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea class="form-control" name="keterangan" cols="30" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="spesifikasi">Spesifikasi</label>
                                        <textarea class="form-control" name="spesifikasi" cols="30" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="justifikasi">Justifikasi</label>
                                        <textarea class="form-control" name="justifikasi" cols="30" rows="3" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Submit</button>
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
