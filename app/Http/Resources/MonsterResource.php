<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MonsterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'               => $this->id,
            'name'             => $this->name,
            'map'              => $this->map,
            'sprite_url'       => $this->sprite,
            'map_image_url'    => $this->map_image_url,
            'respawn' => [
                'min_minutes'  => $this->respawn_time,
                'max_minutes'  => $this->respawn_max_time,
                'is_variable'  => $this->respawn_max_time > $this->respawn_time,
            ],
        ];
    }
}
