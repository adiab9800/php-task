<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController 
{

    public function index()
    {
        $data = CategoryResource::collection(Category::paginate());
        return response()->json($data);
    }
}
