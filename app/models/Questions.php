<?php 

namespace Model; 

use Illuminate\Database\Eloquent\Model as Eloquent;

class Questions extends Eloquent{
	protected $table = 'questions';
	public $timestamps = false;
}