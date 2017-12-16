<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class Menu extends Authenticatable
{
    use Notifiable;
    public $table = 'menu';

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getAllMenu()
    {
        $menuList = DB::table('menu')
            ->select('*')
            ->orderBy('id')
            ->get();

        return $menuList;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getCoursesDetail($slug)
    {
        $coursesInfo = DB::table('courses')
            ->select('*')
            ->where('name_slug', '=', $slug)
            ->first();

        return $coursesInfo;
    }

}
