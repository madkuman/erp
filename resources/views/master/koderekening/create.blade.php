@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Kode Rekening</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="{{ route('store_kode_rekening') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kode">Kode Rekening</label>
                                <input type="text" class="form-control @error('kode') is-invalid @enderror"
                                    id="kode" name="kode" placeholder="Masukkan Kode Rekening"
                                    value="{{ old('kode') }}" autofocus required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Rekening</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" placeholder="Masukkan Nama Rekening"
                                    value="{{ old('nama') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="parent">Parent</label>
                                <select name="parent" class="form-control select2bs4">
                                    <option value="">-Pilih Parent-</option>
                                    @foreach ($data_rekening as $option)
                                        <option value="{{ $option->id }}">{{ $option->nama }}</option>
                                    @endforeach
                                </select>
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
