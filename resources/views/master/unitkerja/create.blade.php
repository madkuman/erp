@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Unit Kerja</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="/master/unit-kerja" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kode">Nama Unit Kerja</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Masukkan Nama Unit Kerja" value="{{ old('nama') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="parent">Parent</label>
                                <select name="parent" id="parent" class="form-control select2bs4">
                                    <option value="">-Pilih Parent-</option>
                                    @foreach ($data_unit_kerja as $item)
                                        @if (old('parent') == $item->id)
                                            <option value="{{ $item->id }}" selected>{{ $item->nama }}
                                            </option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endif
                                    @endforeach
                                </select>
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
