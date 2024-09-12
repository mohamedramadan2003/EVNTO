<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSpeaker extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name', 'image', 'bio', 'event_id',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
