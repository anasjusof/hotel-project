<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingHistory extends Model
{
    protected $fillable = [
        'room_id', 'status_id', 'from', 'to', 'contact_name', 'contact_number', 'contact_email', 'remarks'
    ];

    public function room_types(){
    	return $this->belongsTo('App\RoomType');
    }
}
