<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AvailabilityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'seat_id' => $this->seat_id,
            'seat_code' => $this->seat->code,
            'bus_id' => $this->seat->bus_id,
        ];
    }
}
