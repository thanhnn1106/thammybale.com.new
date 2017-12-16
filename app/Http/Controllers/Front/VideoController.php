<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Authen;
use App\Videos;

class VideoController extends \App\Http\Controllers\Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videoList = Videos::getAllVideos();
        return view('front.videos', ['videoList' => $videoList]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function videoDetail($slug)
    {
        $videoDetail = Videos::getVideoDetail($slug);
        return view('front.video_detail', ['videoDetail' => $videoDetail]);
    }
}
