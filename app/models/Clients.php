<?php 

namespace Model;

use Illuminate\Database\Eloquent\Model as Eloquent; 

class Clients extends Eloquent{
	protected $table = 'clients';
	public $timestamps = false;
}