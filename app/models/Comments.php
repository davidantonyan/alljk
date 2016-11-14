<?php 

namespace Model; 

use Illuminate\Database\Eloquent\Model as Eloquent;

class Comments extends Eloquent{
	protected $table = 'comments';
	public $timestamps = false;
}