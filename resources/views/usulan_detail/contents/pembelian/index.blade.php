<div class="tab-pane" id="pembelian">
    <a href="#" class="btn btn-primary btn-sm mt-2 mb-2" data-toggle="modal"
        data-target="#staticBackdrop_pembelian">Tambah
        Pembelian</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Tanggal Pembelian</th>
                <th>ID Paket</th>
                <th>Jumlah Beli</th>
                <th>Harga Beli</th>
                <th>Proses</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_pembelian as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->id_paket }}</td>
                    <td>{{ $item->jumlah_beli }}</td>
                    <td>Rp. {{ number_format($item->harga_beli) }}</td>
                    <td>
                        {{-- <button type="button" class="btn btn-success btn-sm mt-2 mb-2" data-toggle="modal"
                            data-target="#staticBackdrop_penerimaan">
                            Buat Penerimaan
                        </button>
                        <button type="button" class="btn btn-warning btn-sm mt-2 mb-2" data-toggle="modal"
                            data-target="#staticBackdrop_uji_fungsi">
                            Buat Uji Fungsi
                        </button>
                        <button type="button" class="btn btn-secondary btn-sm mt-2 mb-2" data-toggle="modal"
                            data-target="#staticBackdrop_pembayaran">
                            Buat Pembayaran
                        </button> --}}
                        <form action="/pembelian/{{ $item->id }}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" onclick="return confirm('Apakah yakin ingin menghapus data?')"
                                class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop_pembelian" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Transaksi Pembelian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/pembelian" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="usulan_detail_id" name="usulan_detail_id" value="{{ $data->id }}">
                    <div class="form-group">
                        <label for="tanggal">Tanggal Pembelian</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="id_paket">ID Paket</label>
                        <input type="text" class="form-control" name="id_paket" id="id_paket">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_beli">Jumlah Beli</label>
                        <input type="number" class="form-control" name="jumlah_beli" id="jumlah_beli" required>
                    </div>
                    <div class="form-group">
                        <label for="harga_beli">Harga Beli</label>
                        <input type="number" class="form-control" name="harga_beli" id="harga_beli" required>
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" class="form-control" name="link" id="link">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="file">
                                <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="link">Keterangan</label>
                        <textarea name="keterangan" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
