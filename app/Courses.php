<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class Courses extends Authenticatable
{
    use Notifiable;
    public $table = 'courses';

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getAllCourses()
    {
        $coursesInfoList = DB::table('courses')
            ->select('*')
            ->orderBy('id')
            ->get();

        return $coursesInfoList;
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
