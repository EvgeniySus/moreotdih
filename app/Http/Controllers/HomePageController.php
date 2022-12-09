<?php

namespace App\Http\Controllers;

use App\Http\Settings\SiteOptions;
use Illuminate\Http\Request;

class HomePageController extends Controller
{

    public function index()
    {

       // dd(SiteOptions::META_TITLE);
        return view("welcome");
    }

}
