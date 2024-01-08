<div class="tab-pane" id="penawaran">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-sm mt-2 mb-2" data-toggle="modal"
        data-target="#staticBackdrop_penawaran">
        Tambah Penawaran
    </button>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 5%">#</th>
                <th style="width: 15%">Tanggal Penawaran</th>
                <th style="width: 15%">Dibuat Oleh</th>
                <th style="width: 35%">Perihal</th>
                <th style="width: 15%">File</th>
                <th style="width: 15%">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_penawaran as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tanggal_penawaran }}</td>
                    <td>{{ $item->user['name'] }}</td>
                    <td>{{ $item->perihal }}</td>
                    <td>
                        @if ($item->file)
                            <a href="{{ asset('storage/' . $item->file) }}" class="btn btn-primary btn-sm"
                                target="_blank">Buka
                                File</a>
                        @endif
                    </td>
                    <td>
                        <form action="/penawaran/{{ $item->id }}" method="post">
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
<div class="modal fade" id="staticBackdrop_penawaran" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Penawaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/penawaran" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="usulan_detail_id" name="usulan_detail_id" value="{{ $data->id }}">
                    <div class="form-group">
                        <label for="tanggal">Tanggal Penawaran</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="perihal">Perihal</label>
                        <input type="text" class="form-control" name="perihal" id="perihal" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="file">
                                <label class="custom-file-label" for="exampleInputFile">Pilih file PDF</label>
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
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
