@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card bg-light m-3" style="max-width: 18rem;">
                <div class="card-header">Akun Rekening</div>
                <div class="card-body" style="align-text: center">
                    <p style="text-align: center"><a href="{{ route('list-kode-rekening') }}"
                            class="btn btn-warning">Setting</a></p>
                </div>
            </div>
            <div class="card bg-light m-3" style="max-width: 18rem;">
                <div class="card-header">Barang</div>
                <div class="card-body">
                    <p style="text-align: center"><a href="/master/barang" class="btn btn-warning">Setting</a>
                    </p>
                </div>
            </div>
            <div class="card bg-light m-3" style="max-width: 18rem;">
                <div class="card-header">Unit Kerja</div>
                <div class="card-body">
                    <p style="text-align: center"><a href="/master/unit-kerja" class="btn btn-warning">Setting</a></p>
                </div>
            </div>
            <div class="card bg-light m-3" style="max-width: 18rem;">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <p style="text-align: center"><a href="{{ route('list-user') }}" class="btn btn-warning">Setting</a></p>
                </div>
            </div>
            <!-- /.card -->
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection
