<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\TeamCollection;
use App\Http\Resources\TeamResource;
use App\Http\Requests\StoreTeamRequest;
use App\Team;
use App\Player;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TeamCollection(Team::with(['user','players','players.user'])->paginate(3));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamRequest $request)
    {
        $team = new Team;
        $team->user()->associate($request->user());
        $team->name=$request->name;
        $team->logo_uri=$request->logo_uri;
        $team->save();
        return new TeamResource($team);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        if(isset($request->id) && is_numeric($request->id)){

           return new TeamCollection(Team::where('id',$request->id)->with(['players'])->paginate(3));
        }else{
            return new TeamCollection(Team::where('name','like','%'.$request->name,'%')->with(['players'])->paginate(3));
        }

    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::find($id);
        return new TeamResource($team);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTeamRequest $request, $id)
    {
        $team = Team::find($id);
        $team->user()->associate($request->user());
        $team->name=$request->name;
        $team->logo_uri=$request->logo_uri;
        $team->save();
        return new TeamResource($team);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Team::find($id)->delete();
      return new TeamCollection(Team::with(['user','players','players.user'])->paginate(3));
    }
}
