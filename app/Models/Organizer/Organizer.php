<?php

namespace App\Models\Organizer;

use App\Models\Event\Event;
use App\Models\Role\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

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

    public function events()
    {
        return $this->hasMany(Event::class);
    }


        public function scopeFilter(Builder $builder , $filters)
      {
        $options = array_merge([
            'type' => 'team'
        ],$filters);

        $builder->when($options['type'],function ($builder , $value){
            $builder->where('type',$value);
        });
    }
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return
            'https://www.google.com/url?sa=i&url=https%3A%2F%2Ficon-icons.com%2Ficon%2Fieee-logo%2F169993&psig=AOvV
            aw2z07hzEhFVhtHuMd0AMHmy&ust=1726934866664000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCICqxerz0YgDFQAAAAAdAAAAABAE';
        }
        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;

        }
        return asset('storage/' . $this->image);

    }
}
