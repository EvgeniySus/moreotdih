<?php

namespace App\Http\Controllers;

use App\Http\Library\View;
use App\Repositories\HotelRepositories;
use Illuminate\Http\Request;

class HotelPageController extends Controller
{

    public $view;
    private $hotelrepo;

    public function __construct()
    {

        $this->hotelrepo = app(HotelRepositories::class);
        $this->view = new View('hotel');


    }



    public function index($slug)
    {

        if(empty($slug))
        {
            $view=$this->view;
            return view("404", compact('view'))->withErrors(['msg'=>'К сожалению, запрашиваемый адрес не существует']);
        }
        $this->view->SetParam("keywords", 'кейворд');

        $hotel=$this->hotelrepo->getHotel($slug);

        $this->view->AddHotel($hotel);

        $view=$this->view;


        return view("hotel", compact('view'));
    }




}
