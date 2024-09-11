<?php

namespace App\Models\Role;

use App\Models\Organizer\Organizer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function organizers()
    {
        return $this->hasMany(Organizer::class);
    }

    public function permissions()
    {
        return $this->hasMany(RolePermission::class);
    }
}
