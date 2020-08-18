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
            'slug'=>$this->slug,
            'published'=>$this->created_at->format("H:m d F Y"),
            'category'=>$this->category->name,
            'categoryId' => $this->category->id,
            'author'=>$this->user->name,
            'body'=>$this->body,
            'image'=>$this->image,
            'link'=>route('posts.show',$this->slug)
        ];
    }
    public function with($request)
    {
        return ['status'=>'success'];
    }
}
