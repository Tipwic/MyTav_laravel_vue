<?php namespace App\Repositories;

use App\Models\Guild;

class GuildRepository
{
	public function getAll(){
		return Guild::all();
	}

	public function getGuild($id){
		return Guild::findOrFail($id);
	}

}