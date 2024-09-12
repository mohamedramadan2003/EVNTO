<?php

namespace App\Models\Sponsor;

use App\Models\Event\Event;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name', 'event_id', 'logo'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
