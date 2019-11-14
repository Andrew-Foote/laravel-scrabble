<?php

use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\Game::all() as $game)
        {
        	factory(\App\Player::class, 2)->create([
        		'game_id' => $game->id,
        	]);
        }
    }
}
