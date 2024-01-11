<?php

namespace App\Http\Controllers;

use App\Models\UjiFungsi;
use App\Models\Pembelian;
use App\Models\Penerimaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UjiFungsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_pembelian = Pembelian::all();
        $barang_belum_uji_fungsi = Pembelian::whereDoesntHave('uji_fungsi')->get();

        return view('uji_fungsi.index', compact('data_pembelian', 'barang_belum_uji_fungsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pembelian = Pembelian::find($id);

        return view('uji_fungsi.create', compact('pembelian'));
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
            'tanggal_uji_fungsi' => "required",
            'foto' => 'file|max:1024|mimes:jpg,png',
            'file' => 'file|max:1024|mimes:pdf,jpg,png',
            'status' => 'required'
        ]);

        if ($request->file('file')) {
            $validatedData['file'] = $request->file('file')->store('uji_fungsi');
        }
        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('uji_fungsi');
        }

        $validatedData['usulan_detail_id'] = $request->input('usulan_detail_id');
        $validatedData['pembelian_id'] = $request->input('pembelian_id');
        $validatedData['link'] = $request->input('link');
        $validatedData['keterangan'] = $request->input('keterangan');
        $validatedData['created_by'] = Auth::user()->id;

        UjiFungsi::create($validatedData);

        return redirect()->route('index-uji-fungsi')->with([
            'success' => 'Berhasil menambah data uji fungsi',
            'tab' => 'uji fungsi'
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

        return view('uji_fungsi.detail', [
            'data_penerimaan' => $data_penerimaan,
            'data_uji_fungsi' => $data_uji_fungsi
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
        UjiFungsi::where('id', $id)->update([
            'deleted_by' => Auth::user()->id
        ]);
        UjiFungsi::destroy($id);

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
