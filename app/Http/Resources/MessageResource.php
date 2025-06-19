<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'id' => $this->id,
            'sender_id' => $this->sender_id,
            'receiver_id' => $this->receiver_id,
            'content' => $this->content,
            'is_read' => $this->is_read,
            'custom_time' => $this->custom_time,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
