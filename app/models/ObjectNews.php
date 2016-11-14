<?php 

namespace Model; 

use Illuminate\Database\Eloquent\Model as Eloquent;

class ObjectNews extends Eloquent{
	protected $table = 'object_news';
	public $timestamps = false;
}