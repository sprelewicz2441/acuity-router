<?php

namespace JokeORama;

class Request {
	
	private $_uri;
	private $_parameters_qs; //Query string parameter string (post ?)
	private $_request_method;
	private $_destination; //Primary action (controller)

	function __construct(string $uri) {
		$this->_uri = $uri;
		$parsed_uri = parse_url($uri);
		$request_uri_array = explode('/', trim($parsed_uri['path'], '/'));
		$this->_destination = $request_uri_array[0] !== '' ? $request_uri_array[0] : '/';
		$this->_action = $request_uri_array[1] ?? NULL;
	}

	function get_destination(): ?string {
		return $this->_destination ?? NULL;
	}

	function get_action(): ?string {
		return $this->_action ?? NULL;
	}

}