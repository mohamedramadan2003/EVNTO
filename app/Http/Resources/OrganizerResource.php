<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrganizerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->profile->image_url ?? "null",
            'type' => $this->type,
            'facebook_link' => $this->profile->facebook_link ?? "null",
            'linkedin_link' => $this->profile->linkedin_link ?? "null",
            'twitter_link' => $this->profile->twitter_link ?? "null",
            'events' => $this->events->map(function ($event) {
                return [
                    'name' => $event->name,
                    'image' => $event->image_url,
                    'description' => $event->description,
                    'start_date' => $event->start_date,
                    'end_date' => $event->end_date,
                    'time' => $event->time,
                    'type' => $event->type,
                    'status' => $event->status,
                    'category' => $event->category,
                    'booking_link' => $event->booking_link,
                    'rating' => $event->rating->rating ?? "null",
                    'speakers_name' => $event->speakers->pluck('name')->toArray(),
                    'speakers_image' => $event->speakers->pluck('image')->toArray(),
                    'goals' => $event->goals->pluck('name')->toArray(),
                    'location_address' => $event->location->address,
                    'location_latitude' => $event->location->latitude,
                    'location_longitude' => $event->location->longitude,
                ];
            })
        ];
    }
}
