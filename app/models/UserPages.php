<?php 

namespace Model;

use Illuminate\Database\Eloquent\Model as Eloquent; 

class UserPages extends Eloquent{
	protected $table = 'user_pages';
	public $timestamps = false;
}