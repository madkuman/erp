<div class="tab-pane" id="penerimaan">
    {{-- <a href="#" class="btn btn-primary btn-sm mt-2 mb-2" data-toggle="modal"
        data-target="#staticBackdrop_penerimaan">Tambah Penerimaan</a> --}}
    <table class="table mt-4">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Tgl Pembelian</th>
                <th>Jml Beli</th>
                <th>Total Harga Beli</th>
                <th>Jml Penerimaan</th>
                <th>Surat Jalan</th>
                <th>Pengirim</th>
                <th>Penerima</th>
                <th>Ket</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_pembelian as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    @php
                        $data_modal = [
                            'pembelian_id' => $item->id,
                            'haha' => 'hihi',
                        ];
                    @endphp
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->jumlah_beli }}</td>
                    <td>Rp. {{ number_format($item->harga_beli) }}</td>
                    <td>{{ $item->penerimaan['jumlah_penerimaan'] }}</td>
                    <td>{{ $item->penerimaan['nomor_surat_jalan'] }}</td>
                    <td>{{ $item->penerimaan['pengirim'] }}</td>
                    <td>{{ $item->penerimaan['penerima'] }}</td>
                    <td>{{ $item->penerimaan['keterangan'] }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown"
                                aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#staticBackdrop_penerimaan">Buat Penerimaan</a>
                                <div class="dropdown-divider"></div>
                                <form action="/penerimaan/{{ $item->id }}" method="post" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <a href="" type="submit" class="dropdown-item"
                                        onclick="return confirm('Apakah yakin ingin menghapus data?')">Hapus</a>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('usulan_detail.contents.penerimaan.create', ['data_modal' => $data_modal])
