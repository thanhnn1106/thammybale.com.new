<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Authen;
use App\News;

class NewsController extends \App\Http\Controllers\Controller
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
        $newList = News::getAllNews();
        return view('front.news', ['newList' => $newList]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function newsDetail($slug)
    {
        $newDetail = News::getNewsDetails($slug);;
        return view('front.news_detail', ['newDetail' => $newDetail]);
    }
}
