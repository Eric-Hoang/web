<?php

namespace App\Http\Controllers;

use App\Models\App;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $apps = App::whereRaw('LOWER(name) like ?', '%' . $request->q . '%')->get();
        return view('category.show', [
            'apps' => $apps
        ]);
    }
}
