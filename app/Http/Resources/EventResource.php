<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            'id'=>$this->resource->id,
            'title'=>$this->resource->title,
            'text'=>$this->resource->text,
            'user_id'=>$this->resource->user_id,
            'created_at'=>$this->resource->created_at,
        ];

    }
}
