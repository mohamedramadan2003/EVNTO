<?php

namespace App\Models\Organizer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'image', 'facebook_link', 'linkedin_link', 'twitter_link', 'organizer_id',
    ];

    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }
}
