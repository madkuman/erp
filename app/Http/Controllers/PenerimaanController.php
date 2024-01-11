<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Penerimaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_pembelian = Pembelian::all();
        $barang_belum_diterima = Pembelian::whereDoesntHave('penerimaan')->get();

        return view('penerimaan.index', compact('data_pembelian', 'barang_belum_diterima'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pembelian = Pembelian::find($id);

        return view('penerimaan.create', compact('pembelian'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'tanggal' => "required",
            'jumlah_penerimaan' => 'required|integer|min:1',
            'file' => 'file|max:1024|mimes:pdf,jpg,png',
            'penerima' => 'required'
        ]);

        //Validasi total penerimaan tidak boleh melebihi total pembelian
        if ($request->jumlah_penerimaan > $request->jumlah_beli) {
            return redirect()->back()->with('error', 'Jumlah penerimaan tidak boleh lebih dari jumlah yang dibeli.');
        }

        if ($request->file('file')) {
            $validatedData['file'] = $request->file('file')->store('penerimaan');
        }

        // $validatedData['usulan_detail_id'] = $request->input('usulan_detail_id');
        $validatedData['pembelian_id'] = $request->input('pembelian_id');
        $validatedData['nomor_surat_jalan'] = $request->input('nomor_surat_jalan');
        $validatedData['keterangan'] = $request->input('keterangan');
        $validatedData['pengirim'] = $request->input('pengirim');
        $validatedData['penerima'] = $request->input('penerima');
        $validatedData['created_by'] = Auth::user()->id;

        Penerimaan::create($validatedData);
        $data_penerimaan = Penerimaan::all();

        return redirect()->route('index-penerimaan')->with([
            'success' => 'Berhasil menambah penerimaan',
            'tab' => 'penerimaan',
            'data_penerimaan' => $data_penerimaan
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
        return view('penerimaan.detail', compact('data_penerimaan'));
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
        Penerimaan::where('id', $id)->update([
            'deleted_by' => Auth::user()->id
        ]);
        Penerimaan::destroy($id);

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
