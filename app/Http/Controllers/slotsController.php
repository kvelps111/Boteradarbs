<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class slotsController extends Controller
{
    public function index()
    {
        return view('slots.index');  // points to the slots.index view
    }

    public function spin(Request $request)
    {
        $balance = $request->input('balance');
        $bet = $request->input('bet');

        if ($balance < $bet) {
            return response()->json(['error' => 'Insufficient balance']);
        }

        $balance -= $bet;
        $win = rand(0, 1); // Random win/loss logic
        if ($win) {
            $balance += $bet * 5; // Example win multiplier
        }

        return response()->json(['balance' => $balance, 'win' => $win]);
    }
}
