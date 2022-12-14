<?php

namespace App\Http\Controllers;

use App\Http\Settings\SiteOptions;
use Illuminate\Http\Request;

class HomePageController extends Controller
{

    public function index()
    {
        $page_modifay = "index_page";
       // dd(SiteOptions::META_TITLE);
        return view("index", compact('page_modifay'));
    }

}
