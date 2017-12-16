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