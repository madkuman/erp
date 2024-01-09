<div class="tab-pane" id="uji_fungsi">
    <a href="#" class="btn btn-primary btn-sm mt-2 mb-2" data-toggle="modal"
        data-target="#staticBackdrop_uji_fungsi">Tambah Data Uji fungsi</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Tanggal Uji Fungsi</th>
                <th>Foto</th>
                <th>Link Bukti</th>
                <th>Status</th>
                <th>File</th>
                <th style="width: 5%">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_uji_fungsi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tanggal_uji_fungsi }}</td>
                    <td>
                        @if ($item->foto)
                            <a href="{{ asset('storage/' . $item->foto) }}" class="btn btn-secondary btn-sm"
                                target="_blank">Buka Foto</a>
                        @endif
                    </td>
                    <td>{{ $item->link }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        @if ($item->file)
                            <a href="{{ asset('storage/' . $item->file) }}" class="btn btn-secondary btn-sm"
                                target="_blank">Buka File</a>
                        @endif
                    </td>
                    <td>
                        <form action="/uji_fungsi/{{ $item->id }}" method="post">
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
<div class="modal fade" id="staticBackdrop_uji_fungsi" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Uji Fungsi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/uji_fungsi" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="usulan_detail_id" name="usulan_detail_id" value="{{ $data->id }}">
                    <div class="form-group">
                        <label for="tanggal_uji_fungsi">Tanggal Uji Fungsi</label>
                        <input type="date" class="form-control" name="tanggal_uji_fungsi" id="tanggal_uji_fungsi"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Foto</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="foto">
                                <label class="custom-file-label" for="exampleInputFile">Pilih foto</label>
                            </div>
                        </div>
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
                        <label for="status">Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="Baik">
                            <label class="form-check-label" for="inlineRadio1">Baik</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="Tidak baik">
                            <label class="form-check-label" for="inlineRadio2">Tidak Baik</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="link">Catatan</label>
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
