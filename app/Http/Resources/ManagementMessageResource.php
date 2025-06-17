<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ManagementMessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $url = null;
        if ($this->image_url && file_exists(public_path($this->image_url))) {
            $url = env('APP_URL') . '/' . $this->image_url;
        }

        return [
            'id' => $this->id,
            'image_url' =>  $url,
            'account' => $this->account,
            'content' => $this->content,
            'status' => $this->status,
            'custom_time' => $this->custom_time,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
