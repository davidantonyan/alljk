<?php

namespace Model; 

use Illuminate\Database\Eloquent\Model as Eloquent;

class Ads extends Eloquent{
	protected $table = 'ads';
	public $timestamps = false;
}