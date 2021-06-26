<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Course extends JsonResource
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
            'id'=>$this->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'content'=>$this->content,
            'price'=>$this->price,
            'discount'=>$this->discount,
            'thumbnail'=>$this->thumbnail,
            'category_id'=>$this->categorys,
        ];
    }
}
