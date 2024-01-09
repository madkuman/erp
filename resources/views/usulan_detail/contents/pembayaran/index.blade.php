<div class="tab-pane" id="pembayaran">
    <a href="#" class="btn btn-primary btn-sm mt-2 mb-2" data-toggle="modal"
        data-target="#staticBackdrop_pembayaran">Tambah
        Pembayaran</a>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 5%">#</th>
                <th style="width: 15%">Tanggal Pembayaran</th>
                <th style="width: 15%">Nilai Pembayaran</th>
                <th style="width: 15%">Invoice</th>
                <th style="width: 20%">Kuitansi</th>
                <th style="width: 15%">File</th>
                <th style="width: 15%">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_pembayaran as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tanggal_pembayaran }}</td>
                    <td>Rp. {{ number_format($item->nilai_pembayaran) }}</td>
                    <td>
                        @if ($item->invoice)
                            <a href="{{ asset('storage/' . $item->invoice) }}" class="btn btn-secondary btn-sm"
                                target="_blank">Buka Invoice</a>
                        @endif
                    </td>
                    <td>
                        @if ($item->kuitansi)
                            <a href="{{ asset('storage/' . $item->kuitansi) }}" class="btn btn-secondary btn-sm"
                                target="_blank">Buka Kuitansi</a>
                        @endif
                    </td>
                    <td>
                        @if ($item->file)
                            <a href="{{ asset('storage/' . $item->file) }}" class="btn btn-secondary btn-sm"
                                target="_blank">Buka File</a>
                        @endif
                    </td>
                    <td>
                        <form action="/pembayaran/{{ $item->id }}" method="post">
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
<div class="modal fade" id="staticBackdrop_pembayaran" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/pembayaran" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="usulan_detail_id" name="usulan_detail_id" value="{{ $data->id }}">
                    <div class="form-group">
                        <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
                        <input type="date" class="form-control" name="tanggal_pembayaran" id="tanggal_pembayaran"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="nilai_pembayaran">Nilai Pembayaran</label>
                        <input type="number" class="form-control" name="nilai_pembayaran" id="nilai_pembayaran"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Invoice</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="invoice">
                                <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Kuitansi</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="kuitansi">
                                <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                            </div>
                        </div>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
