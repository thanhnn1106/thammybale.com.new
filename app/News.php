<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class News extends Authenticatable
{
    use Notifiable;
    public $table = 'news';

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getAllNews()
    {
        $newsList = DB::table('news')
            ->select('*')
            ->orderBy('created_at', 'desc')
            ->get();

        return $newsList;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getNewsDetails($slug)
    {
        $newsDetail = DB::table('news')
            ->select('*')
            ->where('slug', '=', $slug)
            ->first();

        return $newsDetail;
    }
}
