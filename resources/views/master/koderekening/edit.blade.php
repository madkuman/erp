@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Edit Kode Rekening</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="{{ route('update_kode_rekening') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kode">Kode Rekening</label>
                                <input type="text" class="form-control" id="kode" name="kode"
                                    placeholder="Masukkan Kode Rekening">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Rekening</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Masukkan Nama Rekening">
                            </div>
                            <div class="form-group">
                                <label for="parent">Parent</label>
                                <select name="parent" id="parent_kode_rekening" class="form-control form-control-lg">
                                    <option value="">-Pilih Parent-</option>
                                    @foreach ($data_all as $option)
                                        <option value="{{ $option->id }}">{{ $option->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Ubah Data</button>
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
