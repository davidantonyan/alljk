<?php 

namespace Model; 

use Illuminate\Database\Eloquent\Model as Eloquent;

class Houses extends Eloquent{
	protected $table = 'houses';
	public $timestamps = false;
}