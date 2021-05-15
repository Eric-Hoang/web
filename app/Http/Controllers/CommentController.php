<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\Comment;
use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
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
    public function store(App $app, Request $request)
    {
        $request->validate([
            'rate' => [
                'required',
                // 'integer',
                'min:1',
                'max:5'
            ],
            'content' => [
                'required',
                'string'
            ]
        ]);

        $a = $app->comments()->create([
            'user_id' => Auth::id(),
            'rate' => $request->input('rate'),
            'content' => $request->input('content')
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(App $app, Comment $comment, Request $request)
    {
        if ($comment->user_id !== Auth::id()) {
            abort(401);
        }

        $comment->content = $request->content;
        $comment->save();

        return back();
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
