<?php

namespace App\Http\Controllers;
Use App\jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = jurusan::all();
        return view('jurusan.index',compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jurusan.create');
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
            'jurusan' => 'required|max:255|unique:jurusans',
            'keterangan' => 'required|max:255'
        ]);

        $jurusan = new jurusan;
        $jurusan->jurusan = $request->jurusan;
        $jurusan->keterangan = $request->keterangan;
        $jurusan->save();
        return redirect()->route('jurusans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jurusan = jurusan::findOrFail($id);
        return view('jurusan.show',compact('jurusan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jurusan = jurusan::findOrFail($id);
        return view('jurusan.edit',compact('jurusan'));    
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
            'jurusan' => 'required|max:255',
            'keterangan' => 'required|max:255'
        ]);

        // update data berdasarkan id
        $jurusan = jurusan::findOrFail($id);
        $jurusan->jurusan = $request->jurusan;
        $jurusan->keterangan = $request->keterangan;
        $jurusan->save();
        return redirect()->route('jurusans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jurusan = jurusan::findOrFail($id);
        $jurusan->delete();
        return redirect()->route('jurusans.index');
    }
}
