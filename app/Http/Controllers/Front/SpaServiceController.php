<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Authen;
use App\Menu;
use App\Services;

class SpaServiceController extends \App\Http\Controllers\Controller
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
        $menuList = Menu::getAllMenu();
        $serviceList = Services::getAllServices();
        $data = [
            'menuList' => $menuList,
            'serviceList' => $serviceList
        ];

        return view('front.spa_service', $data);
    }

}
