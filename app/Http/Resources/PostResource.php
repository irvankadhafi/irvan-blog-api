<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'post_id'=>$this->id,
            'title'=>$this->title,
            'published'=>$this->created_at->format("H:m d F Y"),
            'category'=>$this->category->name,
            'author'=>$this->user->name,
            'body'=>$this->body,
            'image'=>$this->image,
        ];
    }
    public function with($request)
    {
        return ['status'=>'success'];
    }
}
