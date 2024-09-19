<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'user_profile';

    protected $fillable = [
        'collage_name', 'image', 'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
