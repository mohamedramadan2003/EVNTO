<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventGoal extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name', 'event_id',
    ];


    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
