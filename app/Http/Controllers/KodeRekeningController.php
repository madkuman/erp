<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KodeRekening;

class KodeRekeningController extends Controller
{
    public function index()
    {
        $data = KodeRekening::all();

        return view('master.koderekening.index', compact('data'));
    }

    public function create()
    {
        $data_rekening = KodeRekening::all();
        return view('master.koderekening.create', compact('data_rekening'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required',
            'nama_rekening' => 'required',
        ]);
        KodeRekening::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'parent' => $request->parent
        ]);

        return redirect('/master/koderekening')->with('success', 'Data Kode Rekening berhasil disimpan.');
    }

    public function edit()
    {
        $data_all = KodeRekening::all();
        // $data = KodeRekening::findorfail($id);
        return view('master.koderekening.edit', compact('data_all'));
    }
}
