<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavouriteEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'event_id',
    ];
}
