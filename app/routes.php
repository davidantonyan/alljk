<?php

$app->get('/',function() use($app) {

	// print_r($app->city->orderBy('id','desc')->get());

	$app->render('index.php');
});

