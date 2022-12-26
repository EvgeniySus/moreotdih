<?php

namespace App\Http\Controllers;

use App\Http\Library\View;
use Illuminate\Http\Request;

class HomePageController extends Controller
{

    public $view;

    public function __construct()
    {

        $this->view = new View('index');


    }


    public function index()
    {

        $page_modifay = "index_page";
       // dd(SiteOptions::META_TITLE);


        $view=$this->view;
        return view("index", compact('view'));
    }

}
