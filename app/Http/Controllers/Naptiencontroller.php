<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Naptiencontroller extends Controller
{
    public function index()
    {
        $deposits = Auth::user()->deposits()->with('card')->get();

        return view('naptien', [
            'deposits' => $deposits
        ]);
    }

    public function naptien(Request $request)
    {
        $request->validate([
            'seri' => 'required|string',
            'cardNumber' => 'required|string'
        ]);

        $card = Card::where('seri', $request->seri)
            ->where('number', $request->cardNumber)
            ->where('used', false)
            ->first();

        if ($card) {
            Auth::user()->increment('balance', $card->amount);
            $card->used = true;
            $card->save();
            Auth::user()->deposits()->create(['card_id' => $card->id]);
            return back()->withMessage('Deposit successfully.')->with(['status' => 'success']);
        } else {
            return back()->withMessage('Invalid card.')->with(['status' => 'danger']);
        }
    }
}
