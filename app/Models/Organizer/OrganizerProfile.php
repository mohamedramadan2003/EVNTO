<?php

namespace App\Models\Organizer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class OrganizerProfile extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'organizer_profile';

    protected $fillable = [
        'image', 'facebook_link', 'linkedin_link', 'twitter_link', 'organizer_id',
    ];


    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTKnKnw0MtmVH5_-A-wrEh5OiTSL3lu_5MZZA&s';
        }
        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;

        }
        return asset('storage/' . $this->image);

    }


}
