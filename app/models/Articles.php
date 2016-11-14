<?php 

namespace Model; 

use Illuminate\Database\Eloquent\Model as Eloquent;

class Articles extends Eloquent{
	protected $table = 'articles';
	public $timestamps = false;
}