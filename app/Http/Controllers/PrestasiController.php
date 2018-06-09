<?php

namespace App\Http\Controllers;
use App\prestasi;
use App\eskul;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestasi = prestasi::with('eskul')->get();
        return view('prestasi.index',compact('prestasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eskul = eskul::all();
        return view('prestasi.create',compact('eskul'));
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
            'prestasi' => 'required|max:255',
            'keterangan' => 'required|max:255',
            'id_eskul' => 'required'
        ]);

        $prestasi = new prestasi;
        $prestasi->prestasi = $request->prestasi;
        $prestasi->keterangan = $request->keterangan;
        $prestasi->id_eskul = $request->id_eskul;
        $prestasi->save();
        return redirect()->route('prestasis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prestasi = prestasi::findOrFail($id);
        return view('prestasi.show',compact('prestasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prestasi = prestasi::findOrFail($id);
        $eskul = eskul::all();
        $selectedEskul = prestasi::findOrFail($id)->id_eskul;
        return view('prestasi.edit',compact('eskul','prestasi','selectedEskul'));
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
        $this->validate($request,[
            'prestasi' => 'required|max:255',
            'keterangan' => 'required|max:255',
            'id_eskul' => 'required'
        ]);

        // update data berdasarkan id
        $prestasi = prestasi::findOrFail($id);
        $prestasi->prestasi = $request->prestasi;
        $prestasi->keterangan = $request->keterangan;
        $prestasi->id_eskul = $request->id_eskul;
        $prestasi->save();
        return redirect()->route('prestasis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prestasi = prestasi::findOrFail($id);
        $prestasi->delete();
        return redirect()->route('prestasis.index');
    }
}
