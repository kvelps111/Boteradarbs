<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class slotsController extends Controller
{
    public function index()
    {
        return view('slots.index');  // points to the slots.index view
    }
}
