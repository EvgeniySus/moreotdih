<?php

namespace App\Http\Library;

use App\Http\Settings\SiteOptions;
use Illuminate\Http\Request;
use App\Models\HotelModel;
use App\Repositories\HotelRepositories;

class View extends SiteOptions
{

    public $siteoption;

    public $servdata;

    public $metatitle;
    public $keywords;
    public $discription;
    public $title_page;
    public $page_modifay;
    public $hotel;
    public $doc;
    public $listrazdel;


    private $docrepo;
    private $hotelrepo;

//$type - какой материал пришел госинница, статься, раздел
    public function __construct($type)
    {

        $this->servdata = date("Y-m-d 00:00:01");

        if($type=='hotel') {
            $this->page_modifay = $type . '_page';

        }

        $this->metatitle = $this::META_TITLE_PREFIX." ".$this::META_TITLE;
        $this->keywords = $this::META_KEYWORDS;
        $this->discription = $this::META_DESCRIPTION;
    }


    public function SetParam($param, $value){

        $this->$param = $value;

    }


    // Функция формирования отеля
    public function AddHotel($hotel)
        {

            if($hotel->metatitle)
            {
                $this->metatitle = $this::META_TITLE_PREFIX.' '.$hotel->metatitle;
            }


            $this->hotel =  $hotel;
        }


}
