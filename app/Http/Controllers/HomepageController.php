<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Kabupaten;
use App\Kecamatan;

class HomepageController extends Controller
{
    public function index()
    {
        $contents = Content::where('status_publish',1)->latest()->limit(12)->get();
        return view('homepage.index', compact('contents'));
    }

    public function detailContent(Kabupaten $kabupaten, Kecamatan $kecamatan, Content $content)
    {
        $contents = Content::where('status_publish',1)->get()->random('5');
        $kabupatens = Kabupaten::get()->random('5');
        return view('homepage.detail', compact('kabupaten','kecamatan','content','contents','kabupatens'));
    }

    public function getContentKabupaten(Kabupaten $kabupaten)
    {
        $kecamatan = Kecamatan::where('kabupaten_id',$kabupaten->id)->pluck('id');
        $contents = Content::where('status_publish',1)->whereIn('kecamatan_id',$kecamatan)->paginate(3);
        return view('homepage.getContentKabupaten', compact('contents','kabupaten'));
    }

    public function getKabupaten()
    {
        $kabupatens = Kabupaten::all();
        return view('homepage.getKabupaten', compact('kabupatens'));
    }

    public function result(Request $request)
    {
        $search = $request->search;
        
        $kecamatan = Kecamatan::where('name','like','%' . $search . '%')->first();
        $kabupaten = Kabupaten::where('name','like','%' . $search . '%')->first();
        $contents = Content::where('status_publish',1)->where('title','like','%' . $search . '%')->paginate(12);

        if($kecamatan == !null){
            $contents = Content::where('status_publish',1)->where('kecamatan_id',$kecamatan->id)->paginate(12);
        }

        if($kabupaten == !null){
            $kecamatan = Kecamatan::where('kabupaten_id',$kabupaten->id)->pluck('id');
            $contents = Content::whereIn('kecamatan_id',$kecamatan)->paginate(12);
        }
        return view('homepage.result', compact('search','contents'));
    }

    public function otherContent()
    {
        $current_id = Content::where('status_publish',1)->offset(0)->limit(12)->latest()->pluck('id');
        $contents = Content::where('status_publish',1)->latest()->whereNotIn('id', $current_id)->paginate(12);
        return view('homepage.otherContent', compact('contents'));
    }


}
