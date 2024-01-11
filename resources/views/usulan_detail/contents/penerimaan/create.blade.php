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
                    <input type="hidden" name="usulan_detail_id" value="{{ $item->usulan_detail_id }}">
                    {{-- <input type="hidden" name="pembelian_id" value="{{ $data_modal['pembelian_id'] }}"> --}}
                    <div class="form-group">
                        <label for="tanggal">ID Pembelian</label>
                        <input type="text" class="form-control" name="pembelian_id" value="{{ $data_modal['haha'] }}"
                            disabled>
                    </div>
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
                                <label class="custom-file-label" for="exampleInputFile">Pilih
                                    file</label>
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
