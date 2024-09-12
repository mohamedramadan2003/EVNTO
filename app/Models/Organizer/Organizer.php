<?php

namespace App\Models\Organizer;

use App\Models\Role\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Organizer extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password', 'type', 'role_id',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function profile()
    {
        return $this->hasOne(OrganizerProfile::class);
    }
}
