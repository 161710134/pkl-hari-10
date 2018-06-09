<?php

namespace App\Http\Controllers;

use App\eskul;
use Illuminate\Http\Request;

class EskulController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eskul = eskul::all();
        return view('eskul.index',compact('eskul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('eskul.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	  $this->validate($request,[
            'nama' => 'required|max:255',
            'keterangan' => 'required|max:255',
        ]);

        $eskul = new eskul;
        $eskul->nama = $request->nama;
        $eskul->keterangan = $request->keterangan;
        $eskul->save();
        return redirect()->route('eskuls.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eskul = eskul::findOrFail($id);
        return view('eskul.show',compact('eskul'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $eskul = eskul::findOrFail($id);
        return view('eskul.edit',compact('eskul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|max:255',
            'keterangan' => 'required|max:255',
        ]);

        // update data berdasarkan id
        $eskul = eskul::findOrFail($id);
        $eskul->nama = $request->nama;
        $eskul->keterangan = $request->keterangan;
        $eskul->save();
        return redirect()->route('eskuls.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eskul = eskul::findOrFail($id);
        $eskul->delete();
        return redirect()->route('eskuls.index');  
    }
}
