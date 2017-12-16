<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Authen; 
use App\Courses;

class TrainingCourseController extends \App\Http\Controllers\Controller
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
        $courseList = Courses::getAllCourses();
        return view('front.training_course', ['courseList' => $courseList]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function courseDetail(Request $request, $slug)
    {
        $courseDetail = Courses::getCoursesDetail($slug);
        return view('front.training_course_detail', ['courseDetail' => $courseDetail]);
    }

}
