<?php

/**
 * Joke-O-Rama. Simple routing and VC engine.
 *
 * Scott Prelewicz sprelewicz@gmail.com
 *
 */

declare(strict_types=1);
require_once dirname(__DIR__) . '/vendor/autoload.php';
use \JokeORama\Route;
use \JokeORama\Request;
use \JokeORama\Controllers\JokeAPIController;
use \JokeORama\Controllers\HomeController;
use \JokeORama\Controllers\BaseController;

$request = new Request($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

// set up our routes.
$routes = array(
	'/' => new HomeController(),
	'api' => new JokeAPIController($request),
);

// Create routes and dispatch
if($_SERVER['REQUEST_METHOD'] === 'GET') {
	$route = new Route($routes);
	$route->dispatch($request);
} else {

}