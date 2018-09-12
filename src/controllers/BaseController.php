<?php

namespace JokeORama\Controllers;

abstract class BaseController {
	abstract protected function index();

	const VIEWS_DIRECTORY = '../src/views/';

	public function render(string $filename, string $content = NULL, bool $from_api = NULL): void {
		$file_extension = $from_api ? '.json' : '.html';
		include self::VIEWS_DIRECTORY . $filename . $file_extension;
	}
}