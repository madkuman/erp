<div class="tab-pane" id="penerimaan">
    <a href="#" class="btn btn-primary btn-sm mt-2 mb-2" data-toggle="modal"
        data-target="#staticBackdrop_penerimaan">Tambah Penerimaan</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Tanggal Pembelian</th>
                <th>Jumlah Beli</th>
                <th>Total Harga Beli</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_pembelian as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->jumlah_beli }}</td>
                    <td>Rp. {{ number_format($item->harga_beli) }}</td>
                    <td>
                        <form action="/penerimaan/{{ $item->id }}" method="post">
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
<div class="modal fade" id="staticBackdrop_penerimaan" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Penerimaan Gudang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/penerimaan" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="usulan_detail_id" name="usulan_detail_id" value="{{ $data->id }}">
                    <div class="form-group">
                        <label for="tanggal">Tanggal Penerimaan</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_penerimaan">Jumlah Diterima</label>
                        <input type="number" class="form-control" name="jumlah_penerimaan" id="jumlah_penerimaan"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="nomor_surat_jalan">Nomor Surat Jalan</label>
                        <input type="text" class="form-control" name="nomor_surat_jalan" id="nomor_surat_jalan"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="pengirim">Pengirim</label>
                        <input type="text" class="form-control" name="pengirim" id="pengirim" required>
                    </div>
                    <div class="form-group">
                        <label for="penerima">Penerima</label>
                        <input type="text" class="form-control" name="penerima" id="penerima">
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
