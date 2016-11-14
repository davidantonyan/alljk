<?php 

namespace Model; 

use Illuminate\Database\Eloquent\Model as Eloquent;

class City extends Eloquent{
	protected $table = 'city';
	public $timestamps = false;
}