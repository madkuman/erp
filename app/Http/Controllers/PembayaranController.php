<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pembelian;
use App\Models\Penerimaan;
use App\Models\UjiFungsi;
use App\Models\UsulanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_pembelian = Pembelian::all();
        $barang_belum_bayar = Pembelian::whereDoesntHave('pembayaran')->get();

        return view('pembayaran.index', [
            'data_pembelian' => $data_pembelian,
            'barang_belum_bayar' => $barang_belum_bayar
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pembelian = Pembelian::find($id);

        return view('pembayaran.create', compact('pembelian'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal_pembayaran' => "required",
            'nilai_pembayaran' => 'required',
            'invoice' => 'file|max:1024|mimes:pdf,jpg,png',
            'kuitansi' => 'file|max:1024|mimes:pdf,jpg,png',
            'file' => 'file|max:1024|mimes:pdf,jpg,png'
        ]);

        //Validasi bahwa total nilai pembayaran yg diinput tidak boleh melebihi pagu total
        $data_usulan_detail = UsulanDetail::find($request->usulan_detail_id);
        $total_pagu = $data_usulan_detail->jumlah * $data_usulan_detail->harga;
        $total_terbayar = Pembayaran::where('pembelian_id', $request->pembelian_id)->sum('nilai_pembayaran');
        if (($request->nilai_pembayaran + $total_terbayar) > $total_pagu) {
            return redirect()->back()->with('error', 'Jumlah nilai pembayaran akumulasi tidak boleh melebihi pagu anggaran');
        }

        if ($request->file('invoice')) {
            $validatedData['invoice'] = $request->file('invoice')->store('invoice');
        }
        if ($request->file('kuitansi')) {
            $validatedData['kuitansi'] = $request->file('kuitansi')->store('kuitansi');
        }
        if ($request->file('file')) {
            $validatedData['file'] = $request->file('file')->store('pembayaran');
        }

        $validatedData['usulan_detail_id'] = $request->input('usulan_detail_id');
        $validatedData['pembelian_id'] = $request->input('pembelian_id');
        $validatedData['created_by'] = Auth::user()->id;

        Pembayaran::create($validatedData);

        return redirect()->route('index-pembayaran')->with([
            'success' => 'Berhasil menambah data pembayaran',
            'tab' => 'pembayaran'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_penerimaan = Penerimaan::with('pembelian')->where('pembelian_id', $id)->first();
        $data_uji_fungsi = UjiFungsi::with('pembelian')->where('pembelian_id', $id)->first();
        $data_pembayaran = Pembayaran::with('pembelian')->where('pembelian_id', $id)->first();

        return view('uji_fungsi.detail', [
            'data_penerimaan' => $data_penerimaan,
            'data_uji_fungsi' => $data_uji_fungsi,
            'data_pembayaran' => $data_pembayaran
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pembayaran::where('id', $id)->update([
            'deleted_by' => Auth::user()->id
        ]);
        Pembayaran::destroy($id);

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
