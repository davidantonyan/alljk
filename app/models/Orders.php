<?php 

namespace Model; 

use Illuminate\Database\Eloquent\Model as Eloquent;

class Orders extends Eloquent{
	protected $table = 'orders';
	public $timestamps = false;
}