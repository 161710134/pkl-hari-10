<?php

namespace App\Http\Controllers;

use App\galeri;
use File;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeri= galeri::all();
        return view('galeri.index',compact('galeri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('galeri.create');
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
            'nama' => 'required',
            'file_gambar' =>'required'
            ]);

        $galeri = new galeri;
        $galeri->nama = $request->nama;
        $galeri->file_gambar =$request->file_gambar;

        if($request->hasfile('file_gambar')){
            $file = $request->file('file_gambar');
            $destinationPath = public_path() .DIRECTORY_SEPARATOR. 'img';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath,$filename);
            $galeri->file_gambar = $filename;
        }
        $galeri->save();
        return redirect()->route('galeri.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galeri = galeri::findOrFail($id);
        return view('galeri.edit',compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|',
            'file_gambar' => 'required|'
        ]);
       $galeri = galeri::findOrFail($id);
       $galeri->nama = $request->nama;

       if($request->hasFile('file_gambar')){
           $file = $request->file('file_gambar');
           $destinationPath = public_path().DIRECTORY_SEPARATOR.'img';
           $filename = str_random(6).'_'.$file->getClientOriginalName();
           $uploadSuccess = $file->move($destinationPath,$filename);
           $galeri->file_gambar = $filename;
       }
        $galeri->save();
        return redirect()->route('galeri.index');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeri = galeri::findOrfail($id);
        

        if($galeri->file_gambar){
            $old_foto = $galeri->file_gambar;
            $filepath = public_path() .DIRECTORY_SEPARATOR.'img'
            . DIRECTORY_SEPARATOR . $galeri->file_gambar;

            try{
                File::delete($filepath);
            } catch (FileNotFoundException $e) {

            }
        }
        $galeri->delete();

        return redirect()->route('galeri.index');
    }
}
