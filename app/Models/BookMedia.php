<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HotelModel;

class BookMedia extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'title',
            'users_id',
            'hotel_id',
            'room_id',
            'filename',
            'discription',
            'type',
            'mime_type',
            'order_by',

        ];


    public function hotel()
{
 $this->belongsTo(HotelModel::class, 'hotel_id', 'id');
}

}
