<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use App\Models\PengadaanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengadaan.index', [
            'data_pengadaan' => Pengadaan::all(),
        ]);
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
        // dd($request);
        $nama_pengadaan = $request->input('nama');
        $usulan_details = $request->input('selectedItems');

        if (!empty($usulan_details)) {
            $pengadaan = new Pengadaan();
            $pengadaan->nama = $nama_pengadaan;
            $pengadaan->created_by = Auth::user()->id;
            $pengadaan->save();
        } else {
            return redirect()->back()->with('error', 'Pilih setidaknya satu data untuk diproses.');
        }

        foreach ($usulan_details as $usulan_detail) {
            $detail = new PengadaanDetail();
            $detail->pengadaan_id = $pengadaan->id;
            $detail->usulan_detail_id = $usulan_detail;
            $detail->save();
        }

        return redirect('/pengadaan')->with('success', 'Paket pengadaan baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pengadaan.view');
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
        //
    }
}
