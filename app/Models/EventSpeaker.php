<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSpeaker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'image', 'bio', 'event_id',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
