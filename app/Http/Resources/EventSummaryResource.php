<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventSummaryResource extends JsonResource
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
            'organizer_name' => $this->organizer->name ?? null,
            'event_name' => $this->name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'time' => $this->time,
            'location' => [
                'address' => $this->location->address ?? null,
                'latitude' => $this->location->latitude ?? null,
                'longitude' => $this->location->longitude ?? null,
            ],
            'type' => $this->type,
            'status' => $this->status,
        ];
    }
}
