<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $category->load('apps');
        // $category->
        return view('category.show', [
            'category' => $category,
            'apps' => $category->apps
        ]);
    }
}
