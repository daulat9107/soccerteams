<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Team;

class Player extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function team(){
        return $this->belongsTo(Team::class);
    }
}
