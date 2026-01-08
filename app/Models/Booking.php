<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'facility_id',
        // 'slot_id',
        'reservation_date',
        'start_time',
        'end_time',
        "guest_count",
        'status',
        // 'note',
        'total_price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }

    // public function slot()
    // {
    //     return $this->belongsTo(Slot::class);
    // }
}
