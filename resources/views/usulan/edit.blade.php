@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Edit Usulan</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="/usulan/{{ $usulan->id }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tahun">Tahun Usulan</label>
                                        <input type="number" name="tahun" class="form-control"
                                            value="{{ old('tahun', $usulan->tahun) }}" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tanggal_usulan">Tanggal Usulan</label>
                                        <div class="form-group">
                                            <input type="date" class="form-control" name="tanggal_usulan"
                                                id="tanggal_usulan"
                                                value="{{ old('tanggal_usulan', $usulan->tanggal_usulan) }}" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <select name="deskripsi" class="form-control select2bs4" required>
                                            <option value="">--Pilih--</option>
                                            @foreach ($jenis_usulan as $item)
                                                @if (old('deskripsi', $usulan->deskripsi) == $item->id)
                                                    <option value="{{ $item->id }}" selected>{{ $item->nama }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_usulan">Nama Usulan</label>
                                <input type="text" class="form-control" id="nama_usulan" name="nama_usulan"
                                    placeholder="Masukkan Nama Usulan"
                                    value="{{ old('nama_usulan', $usulan->nama_usulan) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="unit_kerja">Unit Kerja</label>
                                <select class="form-control select2bs4" name="unit_kerja_id">
                                    <option value="">--Pilih Unit Kerja--</option>
                                    @foreach ($data_unit_kerja as $item)
                                        @if (old('unit_kerja', $usulan->unit_kerja_id) == $item->id)
                                            <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="user_atasan">Atasan Unit Kerja</label>
                                <select name="user_atasan_id" class="form-control select2bs4" required>
                                    <option value="">--Pilih Nama Atasan--</option>
                                    @foreach ($users as $user)
                                        @if (old('user_atasan', $usulan->user_atasan_id) == $user->id)
                                            <option value="{{ $user->id }}" selected>{{ $user->name }}
                                            </option>
                                        @else
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="indikator">Indikator</label>
                                        <input type="text" class="form-control" id="indikator" name="indikator"
                                            placeholder="Masukkan Indikator"
                                            value="{{ old('indikator', $usulan->indikator) }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="target">Target</label>
                                        <input type="text" class="form-control" id="target" name="target"
                                            placeholder="Masukkan Target" value="{{ old('target', $usulan->target) }}">
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
