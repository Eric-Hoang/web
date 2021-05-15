<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories = Category::with(['apps' => function ($q) {
        }])->get();


        return view('welcome', [
            'categories' => $categories
        ]);
    }
}
