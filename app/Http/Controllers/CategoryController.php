<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $category->load(['apps' => function ($q) {
            $q->where('status', 'approved');
        }]);
        // $category->
        return view('category.show', [
            'category' => $category,
            'apps' => $category->apps
        ]);
    }

    public function create(Request $request)
    {
        Category::create($request->only('name'));

        return back();
    }

    public function destroy(Category $category)
    {
        $category->loadCount('apps');

        if ($category->apps_count > 0) {
            return back()->with(['message' => 'Unable to delete']);
        }

        $category->delete();

        return back();
    }
}
