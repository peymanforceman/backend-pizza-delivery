<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __invoke(Request $request)
    {
        return CategoryResource::collection(Category::with('products')->sorted()->get());
    }
}
