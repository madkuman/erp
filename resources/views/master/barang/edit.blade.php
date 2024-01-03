@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Edit Barang</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="/master/barang/{{ $barang->id }}" method="POST">
                        @method('PUT')
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
                                                @if (old('kode_rekening_id', $barang->id) == $item->id)
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
                                            value="{{ old('nama', $barang->nama) }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="satuan">Satuan</label>
                                        <input type="text" class="form-control @error('satuan') is-invalid @enderror"
                                            id="satuan" name="satuan" placeholder="Masukkan satuan barang"
                                            value="{{ old('satuan', $barang->satuan) }}" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="text" class="form-control @error('harga') is-invalid @enderror"
                                            id="harga" name="harga" placeholder="Masukkan harga barang"
                                            value="{{ old('harga', $barang->harga) }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tipe">Tipe</label>
                                        <input type="text" class="form-control @error('tipe') is-invalid @enderror"
                                            id="tipe" name="tipe" placeholder="Masukkan tipe barang"
                                            value="{{ old('tipe', $barang->tipe) }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="kelompok">Kelompok</label>
                                        <input type="text" class="form-control @error('kelompok') is-invalid @enderror"
                                            id="kelompok" name="kelompok" placeholder="Masukkan kelompok barang"
                                            value="{{ old('kelompok', $barang->kelompok) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Ubah</button>
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
