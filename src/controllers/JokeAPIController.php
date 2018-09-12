<?php
/**
 * Joke API controller
 *
 * Handles calles to the joke api
 *
 *
 * @see BaseController 
 */

namespace JokeORama\Controllers;

class JokeAPIController extends BaseController {

	public function index(): void {
		$this->jokes();
	}

	public function jokes(): void {
		$jokes = file_get_contents('../data/jokes.json');
		$jokes_array = json_decode($jokes);

		$max = $_GET['count'] ?? count($jokes_array);

		if (isset($_GET['random'])) { 
			shuffle($jokes_array);
		}
		$content = array_slice($jokes_array, 0, $max);

		header('Content-Type: application/json; charset=utf8');
        $this->render('api/index', json_encode($content, JSON_PRETTY_PRINT), true);
	}
}