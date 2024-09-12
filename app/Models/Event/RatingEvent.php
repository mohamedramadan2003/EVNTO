<?php

namespace App\Models\Event;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'rating', 'event_id',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
