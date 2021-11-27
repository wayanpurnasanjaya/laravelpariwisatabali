<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kabupaten;
use App\Kecamatan;
use Str;
use Alert;

class KecamatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Kabupaten $kabupaten)
    {
        $kecamatans = Kecamatan::where('kabupaten_id',$kabupaten->id)->get();
        return view('admin.kecamatan.index',compact('kabupaten','kecamatans'));
    }
    public function create(Kabupaten $kabupaten)
    {
        return view('admin.kecamatan.create',compact('kabupaten'));
    }
    public function store(Request $request, Kabupaten $kabupaten)
    {
        $this->validate($request,[
            'kecamatan'=>'required'
        ],
        [
            'kecamatan.required'=> 'Nama Kecamatan Belum Diisi'
        ]);

        Kecamatan::create([
            'kabupaten_id'=>$request->kabupaten,
            'name'=>$request->kecamatan,
            'slug'=> Str::slug($request->kecamatan)
        ]);
        Alert::success('Data Kecamatan Berhasil ditambahkan');
        return redirect()->route('kecamatan.index',$kabupaten);

    }

    public function edit(Kabupaten $kabupaten, kecamatan $kecamatan)
    {
        return view('admin.kecamatan.edit',compact('kabupaten','kecamatan'));
    }

    public function update(Request $request,Kabupaten $kabupaten, Kecamatan $kecamatan)
    {
        $this->validate($request,[
            'kecamatan'=>'required'
        ],
        [
            'kecamatan.required'=>'Nama Kecamatan Belum Diisi'
        ]);
        $kecamatan->update([
            'name'=>$request->kecamatan,
            'slug'=>Str::slug($request->kecamatan)
        ]);

        Alert::success('Data Kecamatan Berhasil Diubah');
        return redirect()->route('kecamatan.index',$kabupaten);
    }

    public function destroy(Kabupaten $kabupaten, Kecamatan $kecamatan)
    {
        $kecamatan->delete();
        return redirect()->route('kecamatan.index',$kabupaten);
    }
}
