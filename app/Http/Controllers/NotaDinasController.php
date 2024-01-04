<?php

namespace App\Http\Controllers;

use App\Models\NotaDinas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotaDinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        // return $request->file('file')->store('nota_dinas');

        $validatedData = $request->validate([
            'tanggal' => "required",
            'perihal' => "required",
            'file' => 'file|max:1024|mimes:pdf'
        ]);

        if ($request->file('file')) {
            $validatedData['file'] = $request->file('file')->store('nota_dinas');
        }

        $validatedData['created_by'] = Auth::user()->id;
        $validatedData['usulan_detail_id'] = $request->input('usulan_detail_id');

        NotaDinas::create($validatedData);

        return redirect()->back()->with('success', 'Berhasil menambah data nota dinas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_nota_dinas = NotaDinas::where('usulan_detail_id', $id)->get();

        return $data_nota_dinas;
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
