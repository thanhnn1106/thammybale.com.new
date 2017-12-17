<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videoList = Videos::getAllVideosAdmin();
        return view('admin.videos.list', ['videoList' => $videoList]);
    }

    /**
     * Add video.
     *
     * @return views
     * @author Nguyen Ngoc Thanh <thanh.nn1106@gmail.com>
     */
    public function add(Request $request)
    {
        if ($request->isMethod('POST')) {
            $paramsAdd = $request->all();

            $rules =  array(
                'title'       => 'required',
                'slug'        => 'required',
                'thumbnail'   => 'required|url',
                'content'     => 'required',
                'description' => 'required'
            );
            // run the validation rules on the inputs from the form
            $validator = Validator::make($paramsAdd, $rules);
            if ($validator->fails()) {
                return redirect()->route('manage_video_add')
                            ->withErrors($validator)
                            ->withInput();
            }
            $saveVideoInfo = Videos::addVideo($paramsAdd);
            if ($saveVideoInfo) {
                return redirect()->route('admin_video_index')->with('success_message', 'Thêm video thành công.');
            }
        }

        return view('admin.videos.add');
    }

    /**
     * Delete video.
     *
     * @return views
     * @author Nguyen Ngoc Thanh <thanh.nn1106@gmail.com>
     */
    public function delete(Request $request)
    {
        $result = Videos::deleteVideo($request->videoId);
        if ($result) {
            Session::flash('success_message', 'Xoá thành công.');

            return response()->json($result);
        }
        Session::flash('error_message', 'Xoá thất bại. Vui lòng thử lại sau.');

        return response()->json($result);
    }

    /**
     * Edit info.
     *
     * @return views
     * @author Nguyen Ngoc Thanh <thanh.nn1106@gmail.com>
     */
    public function edit(Request $request, $id)
    {
        if ($request->isMethod('POST')) {
            $paramsPost = $request->all();
            $rules =  array(
                'title'       => 'required',
                'slug'        => 'required',
                'thumbnail'   => 'required|url',
                'content'     => 'required',
                'description' => 'required'
            );
            // run the validation rules on the inputs from the form
            $validator = Validator::make($paramsPost, $rules);
            if ($validator->fails()) {
                return redirect()->route('manage_video_edit', ['id' => $id])
                            ->withErrors($validator)
                            ->withInput();
            }

            $saveVideoInfo = Videos::updateVideoInfo($paramsPost, $id);
            if ($saveVideoInfo) {

                return redirect()->route('manage_video_edit', ['id' => $id])->with('success_message', 'Cập nhật thông tin thành công.');
            }

            return redirect()->route('manage_video_edit', ['id' => $id])->with('error_message', 'Cập nhật thông tin thất bại.');
        }
        $videoInfo = Videos::getVideoInfo($id);
        return view('admin.videos.edit', ['videoInfo' => $videoInfo]);
    }
}
