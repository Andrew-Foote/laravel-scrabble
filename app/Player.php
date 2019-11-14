<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
	public function member()
	{
		return $this->belongsTo('\App\Member');
	}

	public function game()
	{
		return $this->belongsTo('\App\Game');
	}
}
