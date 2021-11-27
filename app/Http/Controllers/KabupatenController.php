<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kabupaten;
use Str;
use Alert;

class KabupatenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kabupatens = Kabupaten::all();
        return view('admin.kabupaten.index',compact('kabupatens'));
    }

    public function create()
    {
        return view('admin.kabupaten.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'kabupaten'=>'required'
        ],
        [
            'kabupaten.required'=>'Nama Kabupaten Belum Diisi'
        ]);

        Kabupaten::create([
            'name'=>$request->kabupaten,
            'slug'=>Str::slug($request->kabupaten)
        ]);
        Alert::success('Data Kabupaten Berhasil Disimpan');
        return redirect()->route('kabupaten.index');
    }

    public function edit(Kabupaten $kabupaten)
    {
        return view ('admin.kabupaten.edit',compact('kabupaten'));
    }

    public function update(Request $request, Kabupaten $kabupaten)
    {
        $this->validate($request,[
            'kabupaten'=>'required'
        ],
        [
            'kabupaten.required'=>'Nama Kabupaten Belum Diisi'
        ]);
        $kabupaten->update([
            'name'=>$request->kabupaten,
            'slug'=>Str::slug($request->kabupaten)
        ]);
        Alert::success('Data Kabupaten Berhasil Diedit');
        return redirect()->route('kabupaten.index');

    }

    public function destroy(Kabupaten $kabupaten)
    {
        $kabupaten->delete();
        return redirect()->route('kabupaten.index');
    }
}
