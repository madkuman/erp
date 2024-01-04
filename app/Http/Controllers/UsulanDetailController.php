<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\NotaDinas;
use App\Models\Usulan;
use App\Models\UsulanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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
        //
    }

    public function view($id)
    {
        $data = UsulanDetail::with('usulan', 'barang')
            ->find($id);
        $data_nota_dinas = NotaDinas::with('user')->get();
        // dd($data_nota_dinas);

        return view('usulan_detail.view', [
            'data' => $data,
            'data_nota_dinas' => $data_nota_dinas
        ]);
    }
}
