<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'Front\HomeController@index');
Route::get('/trang-chu', 'Front\HomeController@index');
Route::get('/ve-chung-toi', 'Front\AboutUsController@index');
Route::get('/cac-khoa-hoc', 'Front\TrainingCourseController@index');
Route::get('/cac-khoa-hoc/{slug}', 'Front\TrainingCourseController@courseDetail');

Route::get('/dich-vu-spa', 'Front\SpaServiceController@index');
Route::get('/lien-he', 'Front\ContactController@index');


Route::get('/tin-tuc', 'Front\NewsController@index');
Route::get('/tin-tuc/chi-tiet/{slug}', 'Front\NewsController@newsDetail');

Route::get('/video', 'Front\VideoController@index');
Route::get('/video/chi-tiet/{slug}', 'Front\VideoController@videoDetail');

Auth::routes();

Route::get('/admin/dashboard', 'Admin\HomeController@index')->name('admin_dashboard');

Route::get('/admin/manage-news', 'Admin\NewsController@index')->name('admin_news_index');
Route::match(['get', 'post'], '/admin/manage-news/add', 'Admin\NewsController@add')->name('manage_news_add');
Route::match(['get', 'post'], '/admin/manage-news/edit/{id}', 'Admin\NewsController@edit')->name('manage_news_edit');
Route::post('/admin/manage-news/delete', 'Admin\NewsController@delete')->name('manage_news_delete');

Route::get('/admin/manage-video', 'Admin\VideoController@index')->name('admin_video_index');
Route::match(['get', 'post'], '/admin/manage-video/add', 'Admin\VideoController@add')->name('manage_video_add');
Route::match(['get', 'post'], '/admin/manage-video/edit/{id}', 'Admin\VideoController@edit')->name('manage_video_edit');
Route::post('/admin/manage-video/delete', 'Admin\VideoController@delete')->name('manage_video_delete');
