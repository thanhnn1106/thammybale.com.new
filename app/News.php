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
            ->paginate(10);

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getNewsDetailsById($id)
    {
        $newsDetail = DB::table('news')
            ->select('*')
            ->where('id', '=', $id)
            ->first();

        return $newsDetail;
    }

    /**
     * Add news.
     *
     * @return @object
     * @author Nguyen Ngoc Thanh <thanh.nn1106@gmail.com>
     */
    public static function addNews($params)
    {
        $result = DB::table('news')->insert([
            'title'      => $params['title'],
            'slug'       => $params['slug'],
            'thumbnail'  => $params['thumbnail'],
            'author'     => $params['author'],
            'content'    => $params['content'],
            'created_by' => 'admin',
            'updated_by' => 'admin',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return $result;
    }

    /**
     * Update news info.
     *
     * @return @object
     * @author Nguyen Ngoc Thanh <thanh.nn1106@gmail.com>
     */
    public static function updateNewsInfo($params, $newsId)
    {
        $result = false;
        $newsInfo = News::find($newsId);
        if (!$newsInfo) {
            return $result;
        }

        $newsInfo->title      = $params['title'];
        $newsInfo->slug       = $params['slug'];
        $newsInfo->thumbnail  = $params['thumbnail'];
        $newsInfo->author     = $params['author'];
        $newsInfo->content    = $params['content'];
        $newsInfo->updated_at = date('Y-m-d H:i:s');
        $result = $newsInfo->save();
        if ($result) {
            return $result;
        }
        return $result;
    }

    /**
     * Delete news.
     *
     * @return boolean
     * @author Nguyen Ngoc Thanh <thanh.nn1106@gmail.com>
     */
    public static function deleteNews($id)
    {
        $result = false;
        $newsInfo = News::find($id);
        if ($newsInfo) {
            $newsInfo->forceDelete();
            $result = true;
        }

        return $result;
    }

}
