<?php

$app->get('/',function() use($app) {

	$directions = [
		'СЗАО',
		'САО',
		'СВАО',
		'ЗАО',
		'ЦАО',
		'ВАО',
		'ЮЗАО',
		'ЮАО',
		'ЮВАО',
		'ЗелАО',
		'НЕАО',
		'АО',
	];

	$metros = $app->metro->all();

	$cities = $app->city->where('id','!=',79)->get();

	$targets_1 = $app->objects->where('realized',true)->orderBy('id','desc')->take(2)->get();

	$targets_2 = $app->objects->where('realized',true)->orderBy('id','desc')->take(2)->get();


	$app->render('index.php',compact('metros','cities','directions','','targets_1','targets_1'));
	
})->name('index');

