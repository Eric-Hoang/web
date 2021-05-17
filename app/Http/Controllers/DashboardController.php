<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::count();
        $totalApp = App::count();
        $totalCategory = Category::count();

        return view('dashboard', [
            'totalUser' => $totalUser,
            'totalApp' => $totalApp,
            'totalCategory' => $totalCategory
        ]);
    }
}
