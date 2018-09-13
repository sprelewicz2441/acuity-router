<?php

namespace JokeORama;

class Route {
	private $_urls = array();
	private $current_route;

	function __construct(array $routes) {
		$this->_urls = $routes;
		$this->current_route = '';
	}

	public function add(string $identifier, object $obj): void {
		$this->_urls[$identifier] = $obj;
	}

	public function dispatch(Request $request): void {
		$destination = $request->get_destination() ?? '';
		$action = $request->get_action() ?? 'index';

		if (
			isset($this->_urls[$destination]) 
			&& method_exists($this->_urls[$destination], $action)
		) {
			$this->current_route = $this->_urls[$destination];
			$this->current_route->$action();
		} else {
			http_response_code(404);
			include '../src/views/404.html';
		}
	}
}

