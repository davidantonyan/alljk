<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
	'driver'    => $app->config->get('db.driver'),
	'host'      => $app->config->get('db.host'),
	'database'  => $app->config->get('db.name'),
	'username'  => $app->config->get('db.username'),
	'password'  => $app->config->get('db.password'),
	'charset'   => $app->config->get('db.charset'),
	'collation' => $app->config->get('db.collation'),
	'prefix'    => $app->config->get('db.prefix'),
]);


$capsule->setAsGlobal();

$capsule->bootEloquent();

$tables = $capsule::select('SHOW TABLES');

foreach ($tables as $table) {
	$cls  = str_replace(' ','',ucwords(str_replace('_',' ',$table->Tables_in_alljk))); 
	$app->container->set($table->Tables_in_alljk,function() use($cls){
		$cls =  'Model\\'.$cls;
		return new $cls;
	});
}
