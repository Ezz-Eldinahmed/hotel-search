<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'location' => $this->location,
            'price_per_night' => (float) $this->price_per_night,
            'available_rooms' => $this->available_rooms,
            'rating' => $this->rating ? (float) $this->rating : null,
            'source' => $this->source,
        ];
    }
}
