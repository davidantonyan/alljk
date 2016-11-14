<?php 

namespace Model; 

use Illuminate\Database\Eloquent\Model as Eloquent;

class Currency extends Eloquent{
	protected $table = 'currency';
	public $timestamps = false;
}