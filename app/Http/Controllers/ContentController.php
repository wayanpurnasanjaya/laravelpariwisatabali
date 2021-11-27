<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Kecamatan;
use RealRashid\SweetAlert\Facades\Alert;
use Storage;
use Str;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $contents = Content::all();
        if(auth()->user()->hasRole('contributor')){
            $contents = Content::where('user_id',auth()->user()->id)->get();
        }
        return view('admin.content.index',compact('contents'));
    }

    public function create()
    {
        $kecamatans = Kecamatan::all();
        return view('admin.content.create',compact('kecamatans'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'kecamatan'=> 'required|not_in:0',
            'title'=>'required',
            'content'=>'required',
            'thumbnail'=>'required|image|mimes:jpeg,png,jpg'
        ],
        [
            'kecamatan.not_in'=>'kecamatan belum di isikan',
            'title.required'=>'Judul belum diisikan',
            'content.required'=>'konten belum disikan',
            'thumbnail.required'=>'Thumbnail Belum diisikan',
            'thumbnail.mimes'=>'format thumbnail tidak valid',
        ]);
        $image = $request->file('thumbnail')->store('wisata');

        Content::create([
            'kecamatan_id'=> $request->kecamatan,
            'user_id'=> auth()->user()->id,
            'title'=> $request->title,
            'slug'=> Str::slug( $request->title),
            'content'=>$request->content,
            'thumbnail'=> $image,
        ]);
        Alert::success('Data Content Berhasil di Tambahkan');
        return redirect()->route('content.index');
    }

    public function edit(Content $content)
    {
        if(auth()->user()->hasRole('contributor')){
            $this->authorize('edit',$content);
        }
        $kecamatans = Kecamatan::all();
        return view('admin.content.edit', compact('content','kecamatans'));
    }

    public function update(Request $request, Content $content)
    {
        if(auth()->user()->hasRole('contributor')){
            $this->authorize('edit',$content);
        }
        $this->validate($request,[
            'kecamatan'=> 'required|not_in:0',
            'title'=>'required',
            'content'=>'required',
            
        ],
        [
            'kecamatan.not_in'=>'kecamatan belum di isikan',
            'title.required'=>'Judul belum diisikan',
            'content.required'=>'konten belum disikan',
            
        ]);

        if($request->hasFile('thumbnail'))
        {
            $this->validate($request,[
            'thumbnail'=>'required|image|mimes:jpeg,png,jpg',
        ],
        [
            'thumbnail.required'=>'Thumbnail Belum diisikan',
            'thumbnail.mimes'=>'format thumbnail tidak valid',
        ]);
        }
        $image = $content->thumbnail;

        if($request->hasFile('thumbnail')){
            if($content->thumbnail){
                Storage::delete($content->thumbnail);
            }
            $image = $request->file('thumbnail')->store('wisata');
        }

        $content->update([
            'kecamatan_id'=> $request->kecamatan,
            //
            'user_id'=> auth()->user()->id,
            'title'=> $request->title,
            'slug'=> Str::slug( $request->title),
            'content'=>$request->content,
            'thumbnail'=> $image,
        ]);
        Alert::success('Data Berhasil Di ubah');
        return redirect()->route('content.index');
    }

    public function destroy(Content $content)
    {
        $content->delete();
        Storage::delete($content->thumbnail);
        return redirect()->route('content.index');
    }

    public function editStatus(Content $content)
    {
        if(auth()->user()->hasRole('contributor')){
            $this->authorize('edit',$content);
        }
        return view ('admin.content.editStatus', compact('content'));
    }

    public function updateStatus(Request $request, Content $content)
    {
        if(auth()->user()->hasRole('contributor')){
            $this->authorize('edit',$content);
        }
        $content->update([
            'status_publish'=>$request->status
        ]);
        Alert::success('Status Berhasil Dirubah');
        return redirect()->route('content.index');
    }

    public function show(Content $content)
    {
        return view('admin.content.show', compact('content'));
    }


}
