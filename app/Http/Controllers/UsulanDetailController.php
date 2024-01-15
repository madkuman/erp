<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\NotaDinas;
use App\Models\Pembelian;
use App\Models\Penawaran;
use App\Models\Penerimaan;
use App\Models\SPK;
use App\Models\UjiFungsi;
use App\Models\Pembayaran;
use App\Models\Usulan;
use App\Models\UsulanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;

class UsulanDetailController extends Controller
{
    public function index()
    {
        //
    }

    public function create($id)
    {
        $data_usulan = Usulan::find($id);
        $data_barang = Barang::all();
        return view('usulan_detail.create', compact('data_barang', 'data_usulan'));
    }

    public function store(Request $request)
    {
        $barang = Barang::find($request->barang);
        // Memeriksa apakah barang dengan ID 1 ditemukan
        if ($barang) {
            $satuan = $barang->satuan;
        } else {
            // Barang dengan ID 1 tidak ditemukan
            dd('Barang dengan ID 1 tidak ditemukan.');
        }

        UsulanDetail::create([
            'usulan_id' => $request->usulan_id,
            'barang_id' => $request->barang,
            'jumlah' => $request->jumlah,
            'satuan' => $satuan,
            'harga' => $request->harga_satuan,
            'keterangan' => $request->keterangan,
            'link_1' => $request->link_1,
            'link_2' => $request->link_2,
            'link_3' => $request->link_3,
            'justifikasi' => $request->justifikasi,
            'spesifikasi' => $request->spesifikasi,
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('usulan-detail', ['id' => $request->usulan_id])->with('success', 'Rincian Baru Berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data_usulan = Usulan::with('unit_kerja')->find($id);
        $data_usulan_detail = UsulanDetail::with('barang')->where('usulan_id', $id)->get();

        $total = UsulanDetail::where('usulan_id', $id)
            ->sum(DB::raw('jumlah * harga'));

        return view('usulan_detail.index', compact('data_usulan', 'data_usulan_detail', 'total'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $usulan_id = UsulanDetail::select('usulan_id')->where('id', $id)->get();
        UsulanDetail::destroy($id);

        return redirect()->route('usulan-detail', $usulan_id)->with('success', 'Data berhasil dihapus.');
    }

    public function view($id)
    {
        $data = UsulanDetail::with('usulan', 'barang')->find($id);
        $jumlah_terbeli = Pembelian::where('usulan_detail_id', $id)->sum('jumlah_beli');
        $data_nota_dinas = NotaDinas::with('user')->where('usulan_detail_id', $id)->get();
        $data_penawaran = Penawaran::with('user')->where('usulan_detail_id', $id)->get();
        $data_spk = SPK::with('user')->where('usulan_detail_id', $id)->get();
        $data_pembelian = Pembelian::with('user')->where('usulan_detail_id', $id)->get();
        // $data_penerimaan = Penerimaan::with('user')->where('usulan_detail_id', $id)->get();
        // $data_penerimaan = Pembelian::with('user')->where('usulan_detail_id', $id)->get();
        // $data_uji_fungsi = UjiFungsi::with('user')->where('usulan_detail_id', $id)->get();
        // $data_pembayaran = Pembayaran::with('user')->where('usulan_detail_id', $id)->get();
        $data_terbayar = Pembayaran::with('user')->where('usulan_detail_id', $id)->sum('nilai_pembayaran');

        //Menghitung sisa anggaran
        $total_pagu = $data->jumlah * $data->harga;
        $data_sisa_anggaran = $total_pagu - $data_terbayar;

        return view('usulan_detail.view', [
            'data' => $data,
            'total_pagu' => $total_pagu,
            'jumlah_terbeli' => $jumlah_terbeli,
            'data_nota_dinas' => $data_nota_dinas,
            'data_penawaran' => $data_penawaran,
            'data_spk' => $data_spk,
            'data_pembelian' => $data_pembelian,
            // 'data_penerimaan' => $data_penerimaan,
            // 'data_uji_fungsi' => $data_uji_fungsi,
            // 'data_pembayaran' => $data_pembayaran,
            // 'data_terbayar' => $data_terbayar,
            // 'data_sisa_anggaran' => $data_sisa_anggaran
        ]);
    }

    public function verifikasi(Request $request)
    {
        $usulan_detail_id = $request->input('usulan_detail_id');
        UsulanDetail::where('id', $usulan_detail_id)
            ->update([
                'verified_at' => Carbon::now(),
                'verified_by' => Auth::user()->id
            ]);

        return redirect()->back()->with('success', 'Usulan berhasil diverifikasi.');
    }
}
