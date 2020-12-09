<?php

namespace App\Models\Post;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'title',
        'user_id',
        'slug',
        'body',
        'category_id',
        'image',

    ];
    protected $with=['category','user'];
//    public function getRouteKeyName()
//    {
//        return 'id';
//    }

    public function getDatePost($date)
    {
        return $date ? date('m/d/Y', strtotime($date)) : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
