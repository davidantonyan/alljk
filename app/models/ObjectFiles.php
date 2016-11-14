<?php 

namespace Model; 

use Illuminate\Database\Eloquent\Model as Eloquent;

class ObjectFiles extends Eloquent{
	protected $table = 'object_files';
	public $timestamps = false;
}