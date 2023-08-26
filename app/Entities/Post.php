<?php 

namespace App\Entities;
use CodeIgniter\Entity\Entity;

class Post extends Entity {

	function isOwner() :bool {
		return $this->users_id == auth()->user()->id;
	}

}