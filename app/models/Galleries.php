<?php 

namespace Model; 

use Illuminate\Database\Eloquent\Model as Eloquent;

class Galleries extends Eloquent{
	protected $table = 'galleries';
	public $timestamps = false;
}