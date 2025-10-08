<?php

namespace App\Http\Controllers;
use App\Models\ekskul;
use Illuminate\Http\Request;

class EkskulController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index()
    {
        $ekskul = ekskul::all();
        $jumlah_ekskul = $ekskul->count();
        return view('ekskul',compact('ekskul','jumlah_ekskul'));
    }

   
    public function store(Request $request)
    {
         {
       ekskul::create([
        
       'nama_ekskul'=>$request->nama_ekskul,
        'jadwal'=>$request->jadwal,

       ]);
       return redirect()->route('ekskul.index');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show(ekskul $ekskul)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ekskul = ekskul::findOrFail($id);

        return view('ekskul_edit',compact('ekskul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $ekskul =  ekskul::findOrFail($id);
        $ekskul->update([
        'nama_ekskul'=>$request->nama_ekskul,
        'jadwal'=>$request->jadwal,
        ]);
        return redirect()->route('ekskul.index');
    }

    
    public function destroy($id)
    {
        $ekskul =  ekskul::findOrFail($id);
        
        $ekskul->delete($id);

        return redirect()->route('ekskul.index');
    }
}
