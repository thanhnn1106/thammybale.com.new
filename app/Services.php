<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class Services extends Authenticatable
{
    use Notifiable;
    public $table = 'services';

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getAllServices()
    {
        $serviceList = DB::table('services')
            ->select('*')
            ->orderBy('id')
            ->get();

        return $serviceList;
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
