<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class Videos extends Authenticatable
{
    use Notifiable;
    public $table = 'videos';

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getAllVideos()
    {
        $videoList = DB::table('videos')
            ->select('*')
            ->orderBy('created_at', 'desc')
            ->get();

        return $videoList;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getvideoDetail($slug)
    {
        $videoDetail = DB::table('videos')
            ->select('*')
            ->where('slug', '=', $slug)
            ->first();

        return $videoDetail;
    }
}
