<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        if ($request->hasFile('avatar')) {
            $url = '/storage/' . $request->file('avatar')->storeAs('avatars', auth()->id() . '.' . $request->avatar->getClientOriginalExtension(), 'public');
            $user->avatar_url = $url;
        }
        $user->save();

        return back();
    }
}
