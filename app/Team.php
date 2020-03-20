<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Player;

class Team extends Model
{
    protected $fillable=[
        'user_id',
        'name',
        'logo_uri'
    ];
    public function players(){
        return $this->hasMany(Player::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
