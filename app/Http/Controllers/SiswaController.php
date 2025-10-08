<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\ekskul;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        // $siswa = siswa::all();
        // $ekskul = ekskul::all();
        // $jumlah_siswa = $siswa->count();
        // return view('siswa',compact('siswa','ekskul','jumlah_siswa'));

        $query = siswa::query();

    // Cek apakah ada input pencarian
    if ($request->has('search') && $request->search != '') {
        $query->where('nama', 'like', '%' . $request->search . '%');
       
    }
 if ($request->has('ekskul_id') && $request->ekskul_id != '') {
        $query->whereHas('ekskul', function ($q) use ($request) {
            $q->where('ekskul_id', $request->ekskul_id);
        });
    }

    $siswa = $query->get();
    $ekskul = ekskul::all();
    $jumlah_siswa = $siswa->count();

    return view('siswa', compact('siswa', 'ekskul', 'jumlah_siswa'));
    }
    
   
   
    public function store(Request $request)
    {
         {
       siswa::create([
       'nama'=>$request->nama,
        'jenis_kelamin'=>$request->jenis_kelamin,
        'alamat'=>$request->alamat,
        'ekskul_id'=>$request->ekskul_id,

       ]);
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil disimpan!');
    }
    }

      public function edit($id)
    {
       $siswa = siswa::findOrFail($id);
       $ekskul = ekskul::all();
        return view('siswa_edit',compact('siswa','ekskul'));
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
       $siswa =  siswa::findOrFail($id);
        $siswa->update([
        'nama'=>$request->nama,
        'jenis_kelamin'=>$request->jenis_kelamin,
        'alamat'=>$request->alamat,
        'ekskul_id'=>$request->ekskul_id,
        ]);
        return redirect()->route('siswa.index')->with('success_edit', 'Data siswa berhasil disimpan!');
    }

    
    public function destroy($id)
    {
        $siswa =  siswa::findOrFail($id);
        
        $siswa->delete($id);

        return redirect()->route('siswa.index');
    }
}