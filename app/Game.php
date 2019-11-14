<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
	public function players()
	{
		return $this->hasMany('\App\Player');
	}

	public function members()
	{
		return $this->belongsToMany('\App\Member', 'players');
	}

	public function getWinningPlayerAttribute()
	{
		return $this->players->sortByDesc('score')->first();
	}

	public function getWinningMemberIdAttribute()
	{
		return $this->winningPlayer->member_id;
	}
}
