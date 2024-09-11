<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'address', 'latitude', 'longitude', 'event_id',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
