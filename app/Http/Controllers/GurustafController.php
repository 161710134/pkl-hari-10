<?php

namespace App\Http\Controllers;

use App\gurustaf;
use File;
use Illuminate\Http\Request;

class GurustafController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gurustaf = gurustaf::all();
        return view('gurustaf.index',compact('gurustaf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gurustaf.create');
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
            'mapel' => 'required|max:255'
        ]);

        $gurustaf = new gurustaf;
        $gurustaf->nama = $request->nama;
        $gurustaf->mapel = $request->mapel;
        //upload foto
        if ($request->hasFile('foto')){
            $file=$request->file('foto');
            $filename=str_random(6).'_'.$file->getClientOriginalName();
            $destinationPath=public_path().'/assets/admin/images/icon/';
            $uploadSucces= $file->move($destinationPath,$filename);
            $gurustaf->foto= $filename;
        }
        $gurustaf->save();
        return redirect()->route('gurustafs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\gurustaf  $gurustaf
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gurustaf = gurustaf::findOrFail($id);
        return view('gurustaf.show',compact('gurustaf'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\gurustaf  $gurustaf
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gurustaf = gurustaf::findOrFail($id);
        return view('gurustaf.edit',compact('gurustaf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\gurustaf  $gurustaf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|max:255',
            'mapel' => 'required'
        ]);

        // update data berdasarkan id
        $gurustaf = gurustaf::findOrFail($id);
        $gurustaf->nama = $request->nama;
        $gurustaf->mapel = $request->mapel;
        //edit upload foto
        if ($request->hasFile('foto')){
            $file=$request->file('foto');
            $filename=str_random(6).'_'.$file->getClientOriginalName();
            $destinationPath=public_path().'/assets/admin/images/icon/';
            $uploadSucces= $file->move($destinationPath,$filename);
            $gurustaf->foto= $filename;
        }
        $gurustaf->save();
        return redirect()->route('gurustafs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\gurustaf  $gurustaf
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gurustaf = gurustaf::findOrFail($id);
        $gurustaf->delete();
        return redirect()->route('gurustafs.index');
    }
}
