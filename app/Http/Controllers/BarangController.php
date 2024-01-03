<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KodeRekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Barang::with('kodeRekening')->get();

        return view('master.barang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.barang.create', [
            'kode_rekening' => KodeRekening::all()
        ]);
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
            'kode_rekening_id' => 'required',
            'nama' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
        ]);

        $validatedData['created_by'] = Auth::user()->id;

        Barang::create($validatedData);

        return redirect('/master/barang')->with('success', 'Data barang baru berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('master.barang.edit', [
            'barang' => Barang::findorfail($id),
            'kode_rekening' => KodeRekening::all()
        ]);
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
        $validatedData = $request->validate([
            'kode_rekening_id' => 'required',
            'nama' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
        ]);

        $validatedData['updated_by'] = Auth::user()->id;

        Barang::where('id', $id)->update($validatedData);

        return redirect('/master/barang')->with('success', 'Data barang berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::destroy($id);

        return redirect('/master/barang')->with('success', 'Data berhasil dihapus.');
    }
}
