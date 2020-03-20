<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PlayerCollection;
use App\Http\Resources\PlayerResource;
use App\Http\Requests\StorePlayerRequest;
use App\Player;
use App\Team;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PlayerCollection(Player::with(['user','team'])->paginate(3));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlayerRequest $request)
    {
        $user=auth('api')->user();

        if(!$user->can('add player')){
            abort(403,'unauthorized');
        }
        $player = new Player;
         $this->playerData($player,$request);
        return new PlayerResource($player);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $player = Player::find($id);
         return new PlayerResource($player);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if(isset($request->id) && is_numeric($request->id)){
           return new PlayerCollection(Player::where('id',$request->id)->with(['team'])->paginate(3));
        }else{

            return new PlayerCollection(Player::where('first_name','like','%'.$request->name.'%')->with(['team'])->paginate(3));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePlayerRequest $request, $id)
    {
        $user=auth('api')->user();

        if(!$user->can('update player')){
            abort(403,'unauthorized');
        }
        $player = Player::findOrFail($id);
        $this->playerData($player,$request);
        return new PlayerResource($player);
    }
    /**
     * [playerData description]
     * @param  [type] $player  [description]
     * @param  [type] $request [description]
     * @return [type]          [description]
     */
    public function playerData(Player $player,StorePlayerRequest $request){
        $team=Team::findOrFail($request->team_id);
        $player->team_id=$team->id;
        $player->user()->associate($request->user());
        $player->first_name=$request->first_name;
        $player->last_name=$request->last_name;
        $player->player_image_uri=$request->player_image_uri;
        $player->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=auth('api')->user();

        if(!$user->can('update player')){
            abort(403,'unauthorized');
        }
          Player::findOrFail($id)->delete();
          return $this->index();
    }
}
