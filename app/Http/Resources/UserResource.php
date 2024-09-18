<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'user_college' => $this->profile->college_name,
            'relations' => [
                'skills' => [
                    'user_skills' => $this->skills->skill
                ],
                'interests' =>
                [
                    'user_interests' => $this->interests->interest
                ]
            ],

        ];
    }
}
