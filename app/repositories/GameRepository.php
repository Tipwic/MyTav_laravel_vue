<?php namespace App\Repositories;

use App\Models\Game;

class GameRepository
{
	public function getAll(){
		return Game::all();
	}

	public function getGame($id){
		return Game::findOrFail($id);
	}

}