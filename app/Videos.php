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
    public static function getAllVideosAdmin()
    {
        $videoList = DB::table('videos')
            ->select('*')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return $videoList;
    }

    /**
     * Add video info.
     *
     * @return @object
     * @author Nguyen Ngoc Thanh <thanh.nn1106@gmail.com>
     */
    public static function addVideo($params)
    {
        $result = DB::table('videos')->insert([
            'title'       => $params['title'],
            'slug'        => $params['slug'],
            'thumbnail'   => $params['thumbnail'],
            'content'     => $params['content'],
            'description' => $params['description'],
            'created_by'  => 'admin',
            'updated_by'  => 'admin',
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s')
        ]);

        return $result;
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

    /**
     * Show the application dashboard.
     *
     * @return array $videoInfo
     * @author Nguyen Ngoc Thanh <thanh.nn1106@gmail.com>
     */
    public static function getVideoInfo($id)
    {
        $videoInfo = DB::table('videos')
            ->select('*')
            ->where('id', '=', $id)
            ->first();

        return $videoInfo;
    }

    /**
     * Update video info.
     *
     * @return @object
     * @author Nguyen Ngoc Thanh <thanh.nn1106@gmail.com>
     */
    public static function updateVideoInfo($params, $videoId)
    {
        $result = false;
        $videoInfo = Videos::find($videoId);
        if (!$videoInfo) {
            return $result;
        }

        $videoInfo->title = $params['title'];
        $videoInfo->slug = $params['slug'];
        $videoInfo->thumbnail = $params['thumbnail'];
        $videoInfo->content = $params['content'];
        $videoInfo->description = $params['description'];
        $videoInfo->updated_at = date('Y-m-d H:i:s');
        $result = $videoInfo->save();
        if ($result) {
            return $result;
        }
        return $result;
    }

}
