<?php

namespace App\Http\Controllers;

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
            'tanggal' => "required",
            'jumlah_penerimaan' => 'required|integer|min:1',
            'file' => 'file|max:1024|mimes:pdf,jpg,png',
            'penerima' => 'required'
        ]);

        if ($request->file('file')) {
            $validatedData['file'] = $request->file('file')->store('penerimaan');
        }

        $validatedData['usulan_detail_id'] = $request->input('usulan_detail_id');
        $validatedData['nomor_surat_jalan'] = $request->input('nomor_surat_jalan');
        $validatedData['keterangan'] = $request->input('keterangan');
        $validatedData['pengirim'] = $request->input('pengirim');
        $validatedData['created_by'] = Auth::user()->id;

        Penerimaan::create($validatedData);

        return redirect()->back()->with([
            'success' => 'Berhasil menambah penerimaan',
            'tab' => 'penerimaan'
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
