@extends('layouts.main')
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Usulan: {{ $data->barang->nama }}</h3>

            <div class="card-tools">
                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                <a href="#" class="btn btn-sm btn-primary">Verifikasi</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-10 order-2 order-md-1">
                    <div class="row">
                        <div class="col-12 col-sm-2">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Jumlah Barang</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{ $data->jumlah }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Pagu Harga Satuan</span>
                                    <span class="info-box-number text-center text-muted mb-0">Rp.
                                        {{ number_format($data->harga) }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Pagu Total</span>
                                    <span class="info-box-number text-center text-muted mb-0">Rp.
                                        {{ number_format($data->jumlah * $data->harga) }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Terbayar</span>
                                    <span class="info-box-number text-center text-muted mb-0">Rp. 0</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Sisa Anggaran</span>
                                    <span class="info-box-number text-center text-muted mb-0">Rp. 0</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-2">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Status</span>
                                    <span class="info-box-number text-center text-muted mb-0">Selesai</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card ">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link" href="#nota_dinas" data-toggle="tab">Nota
                                                Dinas</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#penawaran"
                                                data-toggle="tab">Penawaran</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#spk" data-toggle="tab">SPK</a>
                                        </li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane" id="nota_dinas">
                                            <a href="#" class="btn btn-success btn-sm mb-2" data-toggle="modal"
                                                data-target="#staticBackdrop">Tambah</a>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 5%">#</th>
                                                        <th style="width: 15%">Tanggal Nota Dinas</th>
                                                        <th style="width: 15%">Dibuat Oleh</th>
                                                        <th style="width: 35%">Perihal</th>
                                                        <th style="width: 15%">File</th>
                                                        <th style="width: 15%">Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <a href="" class="btn btn-warning btn-sm">Edit</a>
                                                            <a href="" class="btn btn-danger btn-sm">Hapus</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="penawaran">
                                            <a href="#" class="btn btn-success btn-sm mb-2" data-toggle="modal"
                                                data-target="#staticBackdrop">Tambah</a>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nama Vendor</th>
                                                        <th>Tanggal Penawaran</th>
                                                        <th>File</th>
                                                        <th style="width: 15%">Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <a href="" class="btn btn-warning btn-sm">Edit</a>
                                                            <a href="" class="btn btn-danger btn-sm">Hapus</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.tab-pane -->

                                        <div class="tab-pane" id="spk">
                                            <a href="#" class="btn btn-success btn-sm mb-2" data-toggle="modal"
                                                data-target="#staticBackdrop">Tambah</a>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 5%">#</th>
                                                        <th style="width: 15%">Tanggal Nota Dinas</th>
                                                        <th style="width: 15%">Pengirim</th>
                                                        <th style="width: 35%">Perihal</th>
                                                        <th style="width: 15%">Penerima</th>
                                                        <th style="width: 15%">Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <a href="" class="btn btn-warning btn-sm">Edit</a>
                                                            <a href="" class="btn btn-danger btn-sm">Hapus</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-2 order-1 order-md-2">
                    <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{ $data->usulan->nama_usulan }}</h3>
                    <p class="text-muted">{{ $data->justifikasi }}</p>
                    <br>
                    <div class="text-muted">
                        <p class="text-sm">Unit Pengusul
                            <b class="d-block">{{ $data->usulan->unit_kerja->nama }}</b>
                        </p>
                        <p class="text-sm">Dibuat oleh
                            <b class="d-block">{{ $data->usulan->user->name }}<br /> {{ $data->created_at }}</br>
                        </p>
                    </div>

                    <h5 class="mt-5 text-muted">File Pengadaan</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i>
                                Functional-requirements.docx</a>
                        </li>
                        <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i>
                                UAT.pdf</a>
                        </li>
                        <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i>
                                Email-from-flatbal.mln</a>
                        </li>
                        <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i>
                                Logo.png</a>
                        </li>
                        <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i>
                                Contract-10_12_2014.docx</a>
                        </li>
                    </ul>
                    <div class="text-center mt-5 mb-3">

                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="tanggal">Tanggal Nodin</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal">
                        </div>
                        <div class="form-group">
                            <label for="perihal">Perihal</label>
                            <input type="text" class="form-control" name="perihal" id="perihal">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
