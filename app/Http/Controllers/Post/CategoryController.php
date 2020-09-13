<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Post\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
//        return Category::get();
        $categories=Category::get();
        return CategoryResource::collection($categories);
    }
}
