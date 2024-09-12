<?php

namespace App\Models\Role;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'permission', 'role_id', 'type',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
