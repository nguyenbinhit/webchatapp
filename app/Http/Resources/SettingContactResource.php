<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingContactResource extends JsonResource
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
            'title' => $this->title,
            'phone' => $this->phone,
            'image_url' => $this->image_url,
            'main_account' => $this->main_account,
            'code' => $this->code,
            'data_code' => $this->code_id == null ? new CodeResource($this->code_id) : null,
            'description' => $this->description,
            'key_word' => $this->key_word,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
