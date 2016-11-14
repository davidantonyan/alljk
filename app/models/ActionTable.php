<?php

namespace Model; 

use Illuminate\Database\Eloquent\Model as Eloquent;

class ActionTable extends Eloquent{
	protected $table = 'action_table';
	public $timestamps = false;
}