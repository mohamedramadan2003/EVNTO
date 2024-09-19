<?php

namespace App\Models\Event;

use App\Models\Organizer\Organizer;
use App\Models\Sponsor\Sponsor;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'image', 'description', 'start_date', 'end_date', 'time', 'type', 'category', 'booking_link',
    ];

    public function goals()
    {
        return $this->hasMany(EventGoal::class);
    }

    public function location()
    {
        return $this->hasOne(EventLocation::class);
    }

    public function speakers()
    {
        return $this->hasMany(EventSpeaker::class);
    }

    public function comments()
    {
        return $this->hasMany(EventComment::class);
    }

    public function favouriteUsers()
    {
        return $this->belongsToMany(User::class, 'favourite_events')->withTimestamps();
    }

    public function recommended()
    {
        return $this->hasMany(RecommendedEvent::class);
    }

    public function rating()
    {
        return $this->hasOne(RatingEvent::class);
    }

    public function sponsors()
    {
        return $this->hasMany(Sponsor::class);
    }

    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }


}
