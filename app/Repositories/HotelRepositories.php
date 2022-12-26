<?php

namespace App\Repositories;

use App\Models\HotelModel as Model;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\BaseRepositories;
use Illuminate\Support\Facades\DB;


/** Класс HotelAdminRepositories
 *
 * @package App\Repositories
 */

class HotelRepositories extends BaseRepositories
{


    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получения данных отеля по slug
     * @param $slug
     * @return mixed
     */
    public function getHotel($slug)
   {
       $columns = ['book_hotels.*', 'hotel_options.views_adres', 'hotel_options.statussearch', 'hotel_options.statussearch', 'book_media.filename', 'book_media.title as alt', 'book_media.type as mime_type' ];
     $result =  $this
         ->startCondictions()
         ->select($columns)
         ->where('slug', $slug)
         ->where('book_hotels.vid', 1)
         ->whereExists(function ($query) {
             $query->select(DB::raw(1))
                 ->from('hotel_options')
                 ->whereColumn('hotel_options.hotel_id', 'book_hotels.id')
                 ->where('hotel_options.openhotel', 1);
         })
         ->leftJoin('hotel_options', 'hotel_options.hotel_id', '=', 'book_hotels.id')
         ->leftJoin('book_media', 'book_media.hotel_id', '=', 'book_hotels.id')->where('book_media.type', 'img')
         ->toBase()
         ->first();


     return $result;

    }




    /**
     * Получение списка отелей одного пользователя
     * @param $user_id
     * @param $page
     * @return mixed
     */

    public function getAllWithPaginate($user_id, $page=12)
    {
        $columns = ['id', 'title', 'type'];
        $result = $this
            ->startCondictions()
            ->select($columns)
            ->where('users_id', $user_id)
            ->orderBy('id', 'DESC')
            ->paginate($page);

        return $result;
    }

}
