<?php

use Slim\Slim;
use Noodlehaus\Config;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Model\Objects;

session_cache_limiter(false);
session_start();

ini_set('display_errors', 'On');

define('INC_ROOT', dirname(__DIR__));

require INC_ROOT. '/vendor/autoload.php';

$app = new Slim([
	'mode' => file_get_contents(INC_ROOT.'/app/mode.php')
]);

$app->configureMode($app->config('mode'),function() use ($app){
	$app->config = Config::load(INC_ROOT.'/app/config/'.$app->mode.'.php');
});

require INC_ROOT.'/app/db.php';

$app->container->set('objects',function(){
	return new Objects;
});



// $app->get('/',function(ServerRequestInterface $request){
// 	// print_r($request->getParam('name'));
// });