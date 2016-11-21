<?php 
namespace Model; 

use Illuminate\Database\Eloquent\Model as Eloquent;

class Objects extends Eloquent{
	protected $table = 'objects';
	public $timestamps = false;

	public function getMetro(){
		if($this->metro){
			return Metro::find($this->metro);
		}

		return false;
	}

	public function getCity(){
		if($this->city){
			return City::find($this->city);
		}

		return false;
	}

	public function getAdress(){
		return sprintf('г. %s, ул. %s д. %s %s',
			$this->getCity() ? $this->getCity()->title : $this->region,
			$this->street ? $this->street : $this->district,
			$this->house ? $this->house : 'не указан',
			$this->corpus_n 
		);
	}

	public function getDirection(){
		if($this->direction){
			return $this->direction;
		}

		return 'не указано';
	}

}