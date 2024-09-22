<?php

namespace App\Models\Event;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 'user_id', 'event_id',
    ];

    // Relationship to Event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Add Comment with current user_id
    public static function addComment($eventId, $description)
    {
        return self::create([
            'event_id' => $eventId,
            'description' => $description,
            'user_id' => Auth::id() // Use the authenticated user
        ]);
    }
}
