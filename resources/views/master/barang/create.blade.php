@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Barang</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="/master/barang" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="kode">Kode Rekening Barang</label>
                                        <select name="kode_rekening_id" id="kode_rekening_id"
                                            class="form-control select2bs4">
                                            <option value="">--Pilih Kode Rekening--</option>
                                            @foreach ($kode_rekening as $item)
                                                @if (old('kode_rekening_id') == $item->id)
                                                    <option value="{{ $item->id }}" selected>{{ $item->nama_rekening }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->nama_rekening }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nama">Nama Barang</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            id="nama" name="nama" placeholder="Masukkan Nama Barang"
                                            value="{{ old('nama') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nama">Satuan</label>
                                        <input type="text" class="form-control @error('satuan') is-invalid @enderror"
                                            id="satuan" name="satuan" placeholder="Masukkan satuan barang"
                                            value="{{ old('satuan') }}" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nama">Harga</label>
                                        <input type="text" class="form-control @error('harga') is-invalid @enderror"
                                            id="harga" name="harga" placeholder="Masukkan harga barang"
                                            value="{{ old('harga') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nama">Tipe</label>
                                        <input type="text" class="form-control @error('tipe') is-invalid @enderror"
                                            id="tipe" name="tipe" placeholder="Masukkan tipe barang"
                                            value="{{ old('tipe') }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nama">Kelompok</label>
                                        <input type="text" class="form-control @error('kelompok') is-invalid @enderror"
                                            id="kelompok" name="kelompok" placeholder="Masukkan kelompok barang"
                                            value="{{ old('kelompok') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
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
