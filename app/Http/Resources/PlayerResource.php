<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
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
            'id'                =>$this->id,
            'user_id'           =>$this->user_id,
            'team_id'           =>$this->team_id,
            'first_name'        =>$this->first_name,
            'last_name'         =>$this->last_name,
            'player_image_uri'  =>$this->player_image_uri,
            'user'              =>new UserResource($this->user),
            'team'              =>new TeamResource($this->team)

        ];
    }
}
