<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competition;
use Auth;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_user_id = Auth::user()->id;
        $competitions = Competition::where('establisher', $current_user_id)->get();
        return view('home', compact('competitions'));
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
        $this->validate($request,[
            'competitionName'=>'required'
        ]);

        $competition = new Competition;
        $competition->name = $request->input('competitionName');
        $competition->establisher = Auth::user()->id;
        
        // avoid repeated submit
        $oldCompetitions = Competition::where('name', $competition->name)->get();
        foreach($oldCompetitions as $oldCompetition){
            if($oldCompetition->establisher == $competition->establisher){
                $current_user_id = Auth::user()->id;
                $competitions = Competition::where('establisher', $current_user_id)->get();
                
                // should return error message!!! 
                return view('home', compact('competitions'));
            }
        }
        
        $competition->save();
        $current_user_id = Auth::user()->id;
        $competitions = Competition::where('establisher', $current_user_id)->get();
        return view('home', compact('competitions'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $competition = Competition::find($id);

        return view('competition.show')->with('competition',$competition);
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
