<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\UsulanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'jumlah_beli' => 'required|integer|min:1', //validasi jumlah harus lebih dari nol
            'harga_beli' => 'required|integer|'
        ]);

        //Validasi bahwa jumlah_beli tidak melebihi pagu usulan
        $usulan_detail = UsulanDetail::find($request->usulan_detail_id);

        if (!$usulan_detail || $request->jumlah_beli > $usulan_detail->jumlah) {
            return redirect()->back()->with('error', 'Jumlah beli yang diinput tidak valid atau melebihi jumlah usulan.');
        }

        //Validasi bahwa harga beli yang diinput tidak boleh melebihi pagu total
        $total_pagu = UsulanDetail::where('id', $request->usulan_detail_id)
            ->sum(DB::raw('jumlah * harga'));
        $total_harga_beli = Pembelian::where('usulan_detail_id', $request->usulan_detail_id)
            ->sum(DB::raw('jumlah_beli * harga_beli'));

        if (($total_harga_beli + ($request->jumlah_beli * $request->harga_beli)) > $total_pagu) {
            return redirect()->back()->with('error', 'Total pembelian tidak boleh melebihi total pagu anggaran.');
        }

        //Menyimpan file
        if ($request->file('file')) {
            $validatedData['file'] = $request->file('file')->store('pembelian');
        }

        $validatedData['usulan_detail_id'] = $request->input('usulan_detail_id');
        $validatedData['tanggal'] = $request->input('tanggal');
        $validatedData['id_paket'] = $request->input('id_paket');
        $validatedData['link'] = $request->input('link');
        $validatedData['keterangan'] = $request->input('keterangan');
        $validatedData['created_by'] = Auth::user()->id;

        Pembelian::create($validatedData);

        return redirect()->back()->with('success', 'Data pembelian berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_pembelian = Pembelian::where('usulan_detail_id', $id)->get();

        return $data_pembelian;
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
        Pembelian::where('id', $id)->update([
            'deleted_by' => Auth::user()->id
        ]);
        Pembelian::destroy($id);

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
