<?php

/**
 * HomeController
 *
 * Handles calls to the web homepage
 *
 * @see BaseController
 */

namespace JokeORama\Controllers;

class HomeController extends BaseController {
	public function index() {        
        $this->render('home/index');
	}
}