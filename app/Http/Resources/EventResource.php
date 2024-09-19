<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'time' => $this->time,
            'type' => $this->type,
            'status' => $this->status,
            'category' => $this->category,
            'rating' => $this->rating,
            'booking_link' => $this->booking_link,
            'organizer_id' => $this->organizer_id,
            'speakers' => $this->speakers,
            'goals' => $this->goals,
            'location' => $this->location,
        ];
    }
}
