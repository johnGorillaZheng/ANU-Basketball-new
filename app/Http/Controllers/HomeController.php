<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competition as Competition;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_user_id = Auth::user()->id;
        $competitions = Competition::where('establisher', $current_user_id)->get();
        return view('home', compact('competitions'));
    }
}
