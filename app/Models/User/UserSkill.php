<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'skill', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
