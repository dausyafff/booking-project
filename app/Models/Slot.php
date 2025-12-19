<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $fillable = [
        "facility_id",
        "start_time",
        "end_time",
        "day_of_week",
        "date",
        "is_active"
    ];

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
}
