<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class NewsController extends \App\Http\Controllers\Controller
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
        $newList = News::getAllNews();
        return view('admin.news.list', ['newList' => $newList]);
    }

    /**
     * Add news.
     *
     * @return views
     * @author Nguyen Ngoc Thanh <thanh.nn1106@gmail.com>
     */
    public function add(Request $request)
    {
        if ($request->isMethod('POST')) {
            $paramsAdd = $request->all();

            $rules =  array(
                'title'     => 'required',
                'slug'      => 'required',
                'thumbnail' => 'required|url',
                'author'    => 'required',
                'content'   => 'required',
            );
            // run the validation rules on the inputs from the form
            $validator = Validator::make($paramsAdd, $rules);
            if ($validator->fails()) {
                return redirect()->route('manage_news_add')
                            ->withErrors($validator)
                            ->withInput();
            }

            $saveNewsInfo = News::addNews($paramsAdd);
            if ($saveNewsInfo) {
                return redirect()->route('admin_news_index')->with('success_message', 'Thêm tin thành công.');
            }
        }
        return view('admin.news.add');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if ($request->isMethod('POST')) {
            $paramsPost = $request->all();
            $rules =  array(
                'title'     => 'required',
                'slug'      => 'required',
                'thumbnail' => 'required|url',
                'author'    => 'required',
                'content'   => 'required',
            );
            // run the validation rules on the inputs from the form
            $validator = Validator::make($paramsPost, $rules);
            if ($validator->fails()) {
                return redirect()->route('manage_news_edit', ['id' => $id])
                            ->withErrors($validator)
                            ->withInput();
            }

            $saveNewsInfo = News::updateNewsInfo($paramsPost, $id);
            if ($saveNewsInfo) {

                return redirect()->route('manage_news_edit', ['id' => $id])->with('success_message', 'Cập nhật thông tin thành công.');
            }

            return redirect()->route('manage_news_edit', ['id' => $id])->with('error_message', 'Cập nhật thông tin thất bại.');
        }
        $newsInfo = News::getNewsDetailsById($id);

        return view('admin.news.edit', ['newsInfo' => $newsInfo]);
    }

    /**
     * Delete news.
     *
     * @return views
     * @author Nguyen Ngoc Thanh <thanh.nn1106@gmail.com>
     */
    public function delete(Request $request)
    {
        $result = News::deleteNews($request->newsId);
        if ($result) {
            Session::flash('success_message', 'Xoá thành công.');

            return response()->json($result);
        }
        Session::flash('error_message', 'Xoá thất bại. Vui lòng thử lại sau.');

        return response()->json($result);
    }

}
