<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Content;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $users = User::all();
        $content = Content::count();
        $publish = Content::where('status_publish',1)->count();
        $notPublish = Content::where('status_publish',0)->count();

        $getCountContent = new Content;
        $getCountContentPublish = new Content;
        $getCountContentNotPublish = new Content;

        $userContent = Content::where('user_id',auth()->user()->id)->count();
        $userContentPublish = Content::where('user_id',auth()->user()->id)
                            ->where('status_publish',1)
                            ->count();
        $userContentNotPublish = Content::where('user_id',auth()->user()->id)
                            ->where('status_publish',0)
                            ->count();


        return view('admin.dashboard',compact('users','content','publish','notPublish','getCountContent','getCountContentPublish','getCountContentNotPublish','userContent','userContentPublish','userContentNotPublish'));
    }
}

