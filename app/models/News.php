<?php 

namespace Model; 

use Illuminate\Database\Eloquent\Model as Eloquent;

class News extends Eloquent{
	protected $table = 'news';
	public $timestamps = false;
}