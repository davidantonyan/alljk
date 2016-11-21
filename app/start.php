<?php

use Slim\Slim;
use Slim\Views\Twig; 
use Slim\Views\TwigExtension;
use Noodlehaus\Config;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;


session_cache_limiter(false);
session_start();

ini_set('display_errors', 'On');

define('INC_ROOT', dirname(__DIR__));

require INC_ROOT. '/vendor/autoload.php';

$app = new Slim([
	'mode' => file_get_contents(INC_ROOT.'/app/mode.php'),
	'view' => new Twig(),
	'templates.path' => INC_ROOT.'/app/views',
]);

$app->configureMode($app->config('mode'),function() use ($app){
	$app->config = Config::load(INC_ROOT.'/app/config/'.$app->mode.'.php');
});

$view = $app->view();

$view->parserOptions = [
	'debug' => $app->config->get('twig.debug'),
];

$view->parserExtensions = [
	new TwigExtension
];

require INC_ROOT.'/app/db.php';
require INC_ROOT.'/app/routes.php';



