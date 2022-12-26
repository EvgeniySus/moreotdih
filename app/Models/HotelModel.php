<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelModel extends Model
{
    protected $table = "book_hotels";

    use HasFactory;

    protected $fillable =
        [
            'title',
            'users_id',
            'vid',
            'type',
            'country',
            'region',
            'city',
            'citiy_id',
            'adres',
            'star',
            'about',
            'body',
            'deti',
            'slug',
            'location',
            'nutrition',
            'children',
            'special',
            'additionally',
            'starttime',
            'endtime',
            'metatitle',
            'metadescription',
            'metakeywords',
        ];

    protected $casts = [
        'services' => 'array'
    ];

    public function image()
    {
        return $this->hasMany('App\Models\BookMedia', 'hotel_id', 'id');
    }

}
