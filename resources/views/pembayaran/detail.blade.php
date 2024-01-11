@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Detail Uji Fungsi
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <dl>
                                    <dt>Nama Barang / Jasa</dt>
                                    <dd>{{ $data_penerimaan->pembelian->usulan_detail->barang->nama }}</dd>
                                    <dt>Kode Rekening</dt>
                                    <dd>{{ $data_penerimaan->pembelian->usulan_detail->barang->kodeRekening->kode }}<br />
                                        {{ $data_penerimaan->pembelian->usulan_detail->barang->kodeRekening->nama_rekening }}
                                    </dd>
                                    <dt>Unit Pengusul</dt>
                                    <dd>{{ $data_penerimaan->pembelian->usulan_detail->usulan->unit_kerja->nama }}</dd>
                                </dl>
                            </div>
                            <div class="col-6">
                                <dl>
                                    <dt>ID Paket</dt>
                                    <dd>{{ $data_penerimaan->pembelian->id_paket }}</dd>
                                    <dt>Jumlah Pembelian</dt>
                                    <dd>{{ $data_penerimaan->pembelian->jumlah_beli }}
                                        {{ $data_penerimaan->pembelian->usulan_detail->barang->satuan }}</dd>
                                    <dt>Harga Pembelian</dt>
                                    <dd>Rp. {{ number_format($data_penerimaan->pembelian->harga_beli) }}</dd>
                                </dl>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <dl>
                                    <dt>Tanggal Penerimaan</dt>
                                    <dd>{{ $data_penerimaan->tanggal }}</dd>
                                    <dt>Jumlah Diterima</dt>
                                    <dd>{{ $data_penerimaan->jumlah_penerimaan }}
                                    </dd>
                                    <dt>Keterangan</dt>
                                    <dd>{{ $data_penerimaan->keterangan }}</dd>
                                    <dt>File</dt>
                                    <dd>{{ $data_penerimaan->file }}</dd>
                                </dl>
                            </div>
                            <div class="col-6">
                                <dl>
                                    <dt>Nomor Surat Jalan</dt>
                                    <dd>{{ $data_penerimaan->nomor_surat_jalan }}</dd>
                                    <dt>Pengirim</dt>
                                    <dd>{{ $data_penerimaan->pengirim }}</dd>
                                    <dt>Penerima</dt>
                                    <dd>{{ $data_penerimaan->penerima }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="/uji-fungsi" class="btn btn-default">Kembali</a>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
