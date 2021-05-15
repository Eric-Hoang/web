<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(App $app)
    {
        $app->load(['categories', 'comments' => function ($q) {
            $q->orderByDesc('id');
        }]);
        $app->comments->load('user');

        $avgRate = Comment::selectRaw('AVG(rate) as avg')
            ->where('app_id', $app->id)
            ->get()
            ->first();

        $related = $app->categories->load(['apps'])->pluck('apps')->flatten()->filter(function ($e) use ($app) {
            return $e->id !== $app->id;
        });

        $categories = Category::all();
        return view('app.show', [
            'categories' => $categories,
            'app' => $app,
            'avgRate' => $avgRate->avg,
            'relatedApps' => $related
        ]);
    }

    public function mostFreeDownLoad()
    {
        $apps = App::where('is_paid', false)->orderByDesc('download_count')->take(5)->get();

        return view('category.show', [
            'apps' => $apps
        ]);
    }
    public function mostPaidDownload()
    {
        $apps = App::where('is_paid', true)->orderByDesc('download_count')->take(5)->get();

        return view('category.show', [
            'apps' => $apps
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
