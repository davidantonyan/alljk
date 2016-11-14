<?php 

namespace Model; 

use Illuminate\Database\Eloquent\Model as Eloquent;

class Referer extends Eloquent{
	protected $table = 'referer';
	public $timestamps = false;
}