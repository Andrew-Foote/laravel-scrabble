<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
	use Notifiable;

	protected $fillable = [
		'name',
		'email',
		'password'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	public function players()
	{
		return $this->hasMany('\App\Player');
	}

	public function getWinCountAttribute()
	{
		$games = Game::all();
		return $games->where('winningMemberId', $this->id)->count();
	}

	public function games()
	{
		return $this->belongsToMany('\App\Game', 'players');
	}

	public function getGameCountAttribute()
	{
		$games = Game::all();
		return $this->games->count();
	}

	public function getLossCountAttribute()
	{
		return $this->games->where('winningMemberId', '!=', $this->id)->count();
	}

    public function getAverageScoreAttribute()
    {
    	return $this->players->avg('score');
    }
}
