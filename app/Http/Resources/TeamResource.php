<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PlayerResource;

class TeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'id'        =>$this->id,
            'name'      =>$this->name,
            'logo_uri'  =>$this->logo_uri,
            'player'    =>PlayerResource::collection($this->whenLoaded('players')),
            'user'      =>new UserResource($this->user)

        ];
    }
}
