<?php

namespace App\Http\Controllers;

use App\Models\JenisUsulan;
use App\Models\UnitKerja;
use App\Models\User;
use App\Models\Usulan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Usulan::with('unit_kerja')->get();

        return view('usulan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usulan.create', [
            'data_unit_kerja' => UnitKerja::all(),
            'users' => User::all(),
            'jenis_usulan' => JenisUsulan::all()
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
            'tahun' => 'required',
            'nama_usulan' => 'required',
            'deskripsi' => 'required',
            'unit_kerja_id' => 'required',
            'user_atasan_id' => 'required'
        ]);
        $validatedData['tanggal_usulan'] = Carbon::now();
        $validatedData['created_by'] = Auth::user()->id;

        Usulan::create($validatedData);

        return redirect('/usulan')->with('success', 'Usulan Baru Berhasil ditambah.');
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
        return view('usulan.edit', [
            'usulan' => Usulan::findorfail($id),
            'data_unit_kerja' => UnitKerja::all(),
            'users' => User::all(),
            'jenis_usulan' => JenisUsulan::all()
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
            'tahun' => 'required',
            'nama_usulan' => 'required',
            'deskripsi' => 'required',
            'unit_kerja_id' => 'required',
            'user_atasan_id' => 'required'
        ]);
        $validatedData['tanggal_usulan'] = Carbon::now();
        $validatedData['updated_by'] = Auth::user()->id;

        Usulan::where('id', $id)->update($validatedData);

        return redirect('/usulan')->with('success', 'Usulan Baru Berhasil ditambah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Usulan::destroy($id);

        return redirect('/usulan')->with('success', 'Data berhasil dihapus.');
    }
}
