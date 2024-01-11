@extends('layouts.main')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail Usulan #{{ $data->id }}: {{ $data->barang->nama }}</h3>

        <div class="card-tools">
            {{-- <a href="#" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('delete-usulan-detail', $data->id) }}" method="post" class="d-inline">
                @method('DELETE')
                @csrf
                <input type="hidden" name="usulan_id" value="{{ $data_usulan->id }}">
                <button type="submit" onclick="return confirm('Apakah yakin ingin menghapus data?')"
                    class="btn btn-danger btn-sm">Hapus</button>
            </form> --}}
            @if (!empty($data->verified_at))
            <button type="button" class="btn btn-sm btn-primary" disabled>Verified</button>
            @else
            {{-- <a href="{{ route('verifikasi-usulan-detail', $data->id) }}" class="btn btn-sm btn-primary"
                onclick="return confirm('Apakah yakin ingin memverifikasi usulan ini?')">Verifikasi</a> --}}
            <form action="{{ route('verifikasi-usulan-detail') }}" method="post" class="d-inline">
                @csrf
                <input type="hidden" name="usulan_detail_id" value="{{ $data->id }}">
                <button type="submit" class="btn btn-sm btn-primary"
                    onclick="return confirm('Apakah yakin ingin memverifikasi usulan ini?')">Verifikasi</button>
            </form>
            @endif
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
                                <span class="info-box-number text-center text-muted mb-0">{{ $data->jumlah }}
                                    {{ $data->satuan }}</span>
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
                                    {{ number_format($total_pagu) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-2">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Jumlah Terbeli</span>
                                <span class="info-box-number text-center text-muted mb-0">{{ $jumlah_terbeli }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-2">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Total Terbayar</span>
                                <span class="info-box-number text-center text-muted mb-0">Rp.
                                    0</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-2">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Sisa Anggaran</span>
                                <span class="info-box-number text-center text-muted mb-0">Rp.
                                    0</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card ">
                            <div class="card-header p-2">

                                {{-- <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link" href="#nota_dinas" data-toggle="tab">Nota
                                            Dinas</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#penawaran"
                                            data-toggle="tab">Penawaran</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#spk" data-toggle="tab">SPK</a>
                                    </li>
                                </ul> --}}
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="contact-tab" data-toggle="tab"
                                            data-target="#nota_dinas" type="button" role="tab" aria-controls="home"
                                            aria-selected="true">Nota Dinas</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="contact-tab" data-toggle="tab"
                                            data-target="#penawaran" type="button" role="tab" aria-controls="profile"
                                            aria-selected="false">Penawaran</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="contact-tab" data-toggle="tab"
                                            data-target="#pembelian" type="button" role="tab" aria-controls="contact"
                                            aria-selected="false">Pembelian</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#spk"
                                            type="button" role="tab" aria-controls="contact"
                                            aria-selected="false">SPK</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="contact-tab" data-toggle="tab"
                                            data-target="#penerimaan" type="button" role="tab" aria-controls="contact"
                                            aria-selected="false">Penerimaan</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="contact-tab" data-toggle="tab"
                                            data-target="#uji_fungsi" type="button" role="tab" aria-controls="contact"
                                            aria-selected="false">Uji Fungsi</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="contact-tab" data-toggle="tab"
                                            data-target="#pembayaran" type="button" role="tab" aria-controls="contact"
                                            aria-selected="false">Pembayaran</button>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    @include('usulan_detail.contents.nota_dinas.index')
                                    @include('usulan_detail.contents.penawaran.index')
                                    @include('usulan_detail.contents.spk.index')
                                    @include('usulan_detail.contents.pembelian.index')
                                    {{-- @include('usulan_detail.contents.penerimaan.index')
                                    @include('usulan_detail.contents.uji_fungsi.index')
                                    @include('usulan_detail.contents.pembayaran.index') --}}
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-2 order-1 order-md-2">
                <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{ $data->usulan->nama_usulan }}</h3>
                <p class="text-muted"></p>
                <br>
                <div class="text-muted">
                    <p class="text-sm">Justifikasi
                        <b class="d-block">{{ $data->justifikasi }}</b>
                    </p>
                    <p class="text-sm">Unit Pengusul
                        <b class="d-block">{{ $data->usulan->unit_kerja->nama }}</b>
                    </p>
                    <p class="text-sm">Dibuat oleh
                        <b class="d-block">{{ $data->usulan->user->name }}<br /> {{ $data->created_at }}</br>
                    </p>
                </div>

                {{-- <h5 class="mt-5 text-muted">File Pengadaan</h5>
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
                </ul> --}}
                <div class="text-center mt-5 mb-3">

                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection