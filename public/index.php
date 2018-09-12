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
use \JokeORama\Controllers\JokeAPIController;
use \JokeORama\Controllers\HomeController;
use \JokeORama\Controllers\BaseController;

// Process the request sent, capturing pretty urls and params
$parsed_uri = parse_url($_SERVER['REQUEST_URI']);
$request_uri_array = explode('/', trim($parsed_uri['path'], '/'));
$request_dest = $request_uri_array[0] !== '' ? $request_uri_array[0] : '/';
$request_action = $request_uri_array[1] ?? NULL;

// set up our routes.
$routes = array(
	'/' => new HomeController(),
	'api' => new JokeAPIController($request_action),
);

// Create routes and dispatch
if($_SERVER['REQUEST_METHOD'] === 'GET') {
	$route = new Route($routes);
	$route->dispatch($request_dest, $request_action);
} else {

}